<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Category;
use App\Entity\User\User;
use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\UpdateRequest;
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
        $parents = Category::defaultOrder()->withDepth()->get();


        return view('admin.category.create', compact('parents'));
    }

    public function store(CreateRequest $request)
    {
//        dd($request->all());

        $category = Category::create($request->all());
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.category.show', $category);
    }

    public function show(Category $category)
    {

        return view('admin.category.show', compact('category'));
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
