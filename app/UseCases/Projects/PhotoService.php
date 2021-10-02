<?php

namespace App\UseCases\Projects;

use App\Entity\Project\Projects\Project;
use App\Helpers\ImageHelper;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoService
{
    public function addPhoto(int $id, UploadedFile $image): void
    {
        $project = Project::findOrFail($id);

        $imageName = ImageHelper::getRandomName($image);

        DB::beginTransaction();
        try {
            $photo = $project->photos()->create([
                'product_id' => $project->id,
                'file' => $imageName,
                'sort' => 100,
            ]);

            $this->sortPhotos($project);

            ImageHelper::uploadResizedImage($project->id, ImageHelper::FOLDER_PROJECTS, $image, $imageName);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function removePhoto(int $id, int $photoId): bool
    {
        $project = Project::findOrFail($id);

        if ($project->main_photo_id === $photoId) {
            throw new Exception('Cannot delete main photo.');
        }

        $photo = $project->photos()->findOrFail($photoId);

        $this->deletePhotos($project->id, $photo->file);

        DB::beginTransaction();
        try {
            $photo->delete();
            $this->sortPhotos($project);

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function movePhotoUp(int $id, int $photoId): void
    {
        $project = Project::findOrFail($id);
        $photos = $project->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($photoId)) {
                if (!isset($photos[$i - 1])) {
                    $previous = $photos->last();
                    $photos[count($photos) - 1] = $photo;
                    $photos[$i] = $previous;
                } else {
                    $previous = $photos[$i - 1];
                    $photos[$i - 1] = $photo;
                    $photos[$i] = $previous;
                }
                $project->photos = $photos;
                DB::beginTransaction();
                try {
                    $this->sortPhotos($project);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function movePhotoDown(int $id, int $photoId): void
    {
        $project = Project::findOrFail($id);
        $photos = $project->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($photoId)) {
                if (!isset($photos[$i + 1])) {
                    $next = $photos->first();
                    $photos[0] = $photo;
                    $photos[$i] = $next;
                } else {
                    $next = $photos[$i + 1];
                    $photos[$i + 1] = $photo;
                    $photos[$i] = $next;
                }
                $project->photos = $photos;
                DB::beginTransaction();
                try {
                    $this->sortPhotos($project);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    private function sortPhotos(Project $project): void
    {
        foreach ($project->photos as $i => $photo) {
            $photo->setSort($i + 2);
            $photo->saveOrFail();
        }
    }

    private function deletePhotos(int $productId, string $filename)
    {
        Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_PROJECTS . '/' . $productId . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $filename);
        Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_PROJECTS . '/' . $productId . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $filename);
    }
}