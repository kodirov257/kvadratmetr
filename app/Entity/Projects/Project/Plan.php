<?php

namespace App\Entity\Projects\Project;

use App\Helpers\ImageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $project_id
 * @property string $area
 * @property int $area_unit
 * @property int $rooms
 * @property int $bathroom
 * @property string $image
 * @property int $impressions
 * @property int $clicks
 * @property int $leads
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Project $project
 *
 * @property string $imageThumbnail
 * @property string $imageOriginal
 * @mixin Eloquent
 */
class Plan extends Model
{
    protected $table = 'project_project_plans';

    protected $fillable = [
        'area', 'area_unit', 'rooms', 'bathroom', 'image',
    ];


    ########################################### Mutators

    public function getImageThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PROJECT_PLAN . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->image;
    }

    public function getImageOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PROJECT_PLAN . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->image;
    }

    ###########################################


    ########################################### Relations

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    ###########################################
}