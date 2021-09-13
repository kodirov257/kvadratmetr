<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Projects\Category;
use App\Entity\User\User;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Http\Controllers\Controller;
use App\UseCases\Auth\RegisterService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $register;

    public function __construct(RegisterService $register)
    {
        $this->register = $register;
        $this->middleware('can:manage-users');
    }

    public function index(Request $request)
    {
        return view('admin.category.index');
    }

    public function create()
    {



        return view('admin.category.create');
    }

    public function store(CreateRequest $request)
    {
//        $user = User::new( $request->name, $request->email, $request->phone, $request->role);

        return redirect()->route('admin.category.show');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(Category $category)
    {


        return view('admin.category.edit');
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

}
