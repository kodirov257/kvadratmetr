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
        $categories = Category::defaultOrder()->withDepth()->get();

        return view('admin.categories.index', compact('categories'));
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
        $parents = Category::defaultOrder()->withDepth()->get();

        return view('admin.category.edit' , compact('category', 'parents'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category = $this->service->update($category->id, $request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.categories.show', $category);
    }

    public function first(Category $category)
    {
        if ($first = $category->siblings()->defaultOrder()->first()) {
            $category->insertBeforeNode($first);
        }

        return redirect()->route('admin.categories.index');
    }


    public function up(Category $category)
    {
        $category->up();

        return redirect()->route('admin.categories.index');
    }

    public function down(Category $category)
    {
        $category->down();

        return redirect()->route('admin.categories.index');
    }

    public function last(Category $category)
    {
        if ($last = $category->siblings()->defaultOrder('desc')->first()) {
            $category->insertAfterNode($last);
        }

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $this->service->remove($category->id);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.categories.index');
    }

}
