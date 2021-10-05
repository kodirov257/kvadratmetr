<?php

namespace App\Entity\Project\Projects;

use App\Helpers\ImageHelper;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $project_id
 * @property string $file
 * @property string $sort
 *
 * @property string $fileThumbnail
 * @property string $fileOriginal
 *
 * @property Project $project
 * @mixin Eloquent
 */
class Photo extends Model
{
    protected $table = 'project_project_photos';

    public $timestamps = false;

    protected $fillable = ['file', 'sort'];

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }

    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }


    ########################################### Mutators

    public function getFileThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PROJECTS . '/' . $this->project_id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->file;
    }

    public function getFileOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PROJECTS . '/' . $this->project_id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->file;
    }

    ###########################################


    ########################################### Relations

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    ###########################################
}
