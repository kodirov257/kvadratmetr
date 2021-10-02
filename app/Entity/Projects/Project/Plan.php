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
 * @property int $sort
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
    public const UNIT_CM = 1;
    public const UNIT_M = 2;

    protected $table = 'project_project_plans';

    protected $fillable = [
        'area', 'area_unit', 'rooms', 'bathroom', 'image', 'sort'
    ];

    public static function add(int $id, string $area, string $areaUnit, string $rooms, string $bathroom, string $imageName): self
    {
        return static::make([
            'id' => $id,
            'area' => $area,
            'area_unit' => $areaUnit,
            'rooms' => $rooms,
            'bathroom' => $bathroom,
            'image' => $imageName,
            'sort' => 1000,
        ]);
    }

    public function edit(string $area, string $areaUnit, string $rooms, string $bathroom, string $imageName = null): void
    {
        $this->update([
            'area' => $area,
            'area_unit' => $areaUnit,
            'rooms' => $rooms,
            'bathroom' => $bathroom,
            'image' => $imageName ?: $this->image,
        ]);
    }

    public static function unitsList(): array
    {
        return [
            self::UNIT_CM => 'Centimeter',
            self::UNIT_M => 'Meter',
        ];
    }

    public function unitName(): string
    {
        return self::unitsList()[$this->area_unit];
    }

    public function isIdEqualTo(int $id): bool
    {
        return $this->id === $id;
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }


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