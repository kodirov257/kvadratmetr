<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Entity\User\User;
use App\Services\Sms\SmsSender;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    private $sms;
    protected $username;

    public function __construct(SmsSender $sms)
    {
        $this->middleware('guest')->except('logout');
        $this->sms = $sms;
        $this->username = $this->findUsername();
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $authenticate = Auth::attempt(
            $request->only([$this->username(), 'password']),
            $request->filled('remember')
        );

        if ($authenticate) {
//            $request->session()->regenerate();
//            $this->clearLoginAttempts($request);
            $user = Auth::user();
            if ($user->isWait()) {
                Auth::logout();
                session(['url.intended' => back()->with('error', 'You need to confirm your account. Please check your email.')]);
                $this->redirectTo = back()->with('error', 'You need to confirm your account. Please check your email.');
            }
            if ($user->isPhoneAuthEnabled()) {
                Auth::logout();
                $token = (string)random_int(10000, 99999);
                $request->session()->put('auth', [
                    'id' => $user->id,
                    'token' => $token,
                    'remember' => $request->filled('remember'),
                ]);
                $this->sms->send($user->phone, 'Login code: ' . $token);
                session(['url.intended' => route('login.phone')]);
                $this->redirectTo = route('login.phone');
//                return redirect()->route('login.phone');
            }
            if ($user->isAdmin()) {
                session(['url.intended' => route('admin.home')]);
                $this->redirectTo = route('admin.home');
            } else {
                session(['url.intended' => route('cabinet.home')]);
                $this->redirectTo = route('cabinet.home');
            }

            return $this->sendLoginResponse($request);
//            return redirect()->intended(route('cabinet.home'));
        }

        $this->incrementLoginAttempts($request);

        throw ValidationException::withMessages(['email' => [trans('auth.failed')]]);
    }

    public function phone()
    {
        return view('auth.phone');
    }

    public function verify(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $this->validate($request, [
            'token' => 'required|string',
        ]);

        if (!$session = $request->session()->get('auth')) {
            throw new BadRequestHttpException('Missing token info.');
        }

        /** @var User $user */
        $user = User::findOrFail($session['id']);

        if ($request['token'] === $session['token']) {
            $request->session()->flush();
            $this->clearLoginAttempts($request);
            Auth::login($user, $session['remember']);
            return redirect()->intended(route('cabinet.home'));
        }

        $this->incrementLoginAttempts($request);

        throw ValidationException::withMessages(['token' => ['Invalid auth token.']]);
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }

    public function findUsername(): string
    {
        $login = request()->input('login');
        $fieldType = $this->isEmail($login) ? 'email' : ($this->isPhone($login) ? 'phone' : 'name');

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    private function isEmail($login): bool
    {
        return filter_var($login, FILTER_VALIDATE_EMAIL);
    }

    private function isPhone($login): bool
    {
        return preg_match('/^\+?998[0-9]{9}$/', $login);
    }

    protected function username(): string
    {
        return $this->username;
    }
}
