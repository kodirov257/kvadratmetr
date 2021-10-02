<?php

namespace App\Http\Controllers\Admin\Project\Projects;

use App\Entity\Project\Projects\Photo;
use App\Entity\Project\Projects\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\PhotosRequest;
use App\UseCases\Projects\PhotoService;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    private $service;

    public function __construct(PhotoService $service)
    {
        $this->service = $service;
    }

    public function addForm(Project $project)
    {
        return view('admin.project.projects.photo', compact('project'));
    }

    public function addPhoto(Project $project, Request $request)
    {
        try {
            $this->validate($request, ['photo' => 'required|image|mimes:jpg,jpeg,png']);

            $this->service->addPhoto($project->id, $request->photo);

            return redirect()->route('admin.project.projects.photo', $project);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function movePhotoUp(Project $project, Photo $photo)
    {
        try {
            $this->service->movePhotoUp($project->id, $photo->id);
            return back();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function movePhotoDown(Project $project, Photo $photo)
    {
        try {
            $this->service->movePhotoDown($project->id, $photo->id);
            return back();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function removePhoto(Project $project, Photo $photo)
    {
        try {
            $this->service->removePhoto($project->id, $photo->id);
            return redirect()->route('admin.project.projects.photos', $project);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}