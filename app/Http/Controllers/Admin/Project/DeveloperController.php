<?php

namespace App\Http\Controllers\Admin\Project;

use App\Entity\Project\Developer;
use App\Entity\User\User;
use App\Http\Requests\Admin\Developers\CreateRequest;
use App\Http\Requests\Admin\Developers\UpdateRequest;
use App\Http\Controllers\Controller;
use App\UseCases\Projects\DeveloperService;
use Exception;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    private $service;

    public function __construct(DeveloperService $service)
    {
        $this->service = $service;
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

        if (!empty($value = $request->get('contact'))) {
            $query->where(function ($query) use ($value) {
                $query->where('main_number', 'ilike', '%' . $value . '%')
                    ->orWhere('call_center', 'ilike', '%' . $value . '%')
                    ->orWhere('website', 'ilike', '%' . $value . '%')
                    ->orWhere('email', 'ilike', '%' . $value . '%')
                    ->orWhere('facebook', 'ilike', '%' . $value . '%')
                    ->orWhere('instagram', 'ilike', '%' . $value . '%')
                    ->orWhere('tik_tok', 'ilike', '%' . $value . '%')
                    ->orWhere('telegram', 'ilike', '%' . $value . '%')
                    ->orWhere('youtube', 'ilike', '%' . $value . '%')
                    ->orWhere('twitter', 'ilike', '%' . $value . '%');
            });
        }

        if (!empty($value = $request->get('number'))) {
            $query->where('main_number', 'like', '%' . $value . '%');
        }

        $developers = $query->paginate(20);

        return view('admin.project.developers.index', compact('developers'));
    }

    public function create(User $user)
    {
        return view('admin.project.developers.create', compact('user'));
    }

    public function store(CreateRequest $request, User $user)
    {
        try {
            $developer = $this->service->create($user->id, $request);
            return redirect()->route('admin.project.users.developers.show', [$user, $developer]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(User $user, Developer $developer)
    {
        return view('admin.project.developers.show', compact('user', 'developer'));
    }

    public function edit(User $user, Developer $developer)
    {
        return view('admin.project.developers.edit', compact('user', 'developer'));
    }

    public function update(UpdateRequest $request, User $user, Developer $developer)
    {
        try {
            $this->service->edit($developer->id, $request);
            return redirect()->route('admin.project.users.developers.show', [$user, $developer]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
