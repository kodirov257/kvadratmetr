<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Entity\Projects\Developer;
use App\Entity\User\User;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Http\Controllers\Controller;
use App\UseCases\Projects\DeveloperService;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    private $register;

    public function __construct(DeveloperService $register)
    {
        $this->register = $register;
        $this->middleware('can:manage-users');
    }

    public function index(Request $request)
    {
        $query = Developer::orderByDesc('id');

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'ilike', '%' . $value . '%')
                    ->orWhere('name_ru', 'ilike', '%' . $value . '%')
                    ->orWhere('name_en', 'ilike', '%' . $value . '%');
            });
        }

        if (!empty($value = $request->get('number'))) {
            $query->where('main_number', 'like', '%' . $value . '%');
        }

        $developers = $query->paginate(20);

        return view('admin.projects.developers.index', compact('developers'));
    }

    public function create()
    {
        $roles = User::rolesList();

        return view('admin.users.create', compact('roles'));
    }

    public function store(CreateRequest $request)
    {
        $user = User::new( $request->name, $request->email, $request->phone, $request->role);

        return redirect()->route('admin.users.show', $user);
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = User::rolesList();
        $statuses = User::statusesList();

        return view('admin.users.edit', compact('user', 'roles', 'statuses'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email', 'phone', 'status']));

        if ($request['role'] !== $user->role) {
            $user->changeRole($request['role']);
        }

        return redirect()->route('admin.users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function verify(User $user)
    {
        $this->register->verify($user->id);

        return redirect()->route('admin.users.show', $user);
    }
}
