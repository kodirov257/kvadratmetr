<?php

namespace App\Entity\Projects;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $icon
 * @property string $comment
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $name
 * @property string $iconThumbnail
 * @property string $iconOriginal
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @mixin Eloquent
 */
class Facility extends BaseModel
{
    protected $table = 'project_facilities';

    public $timestamps = false;

    protected $fillable = ['id', 'name_uz', 'name_ru', 'name_en', 'icon', 'comment'];

    public static function add(int $id, string $nameUz, string $nameRu, string $nameEn, string $comment, string $iconName): self
    {
        return static::create([
            'id' => $id,
            'name_uz' => $nameUz,
            'name_ru' => $nameRu,
            'name_en' => $nameEn,
            'comment' => $comment,
            'icon' => $iconName,
        ]);
    }

    public function edit(string $nameUz, string $nameRu, string $nameEn, string $comment, string $iconName = null): void
    {
        $this->update([
            'name_uz' => $nameUz,
            'name_ru' => $nameRu,
            'name_en' => $nameEn,
            'comment' => $comment,
            'icon' => $iconName ?: $this->icon,
        ]);
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function getIconThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_FACILITIES . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->icon;
    }

    public function getIconOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_FACILITIES . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->icon;
    }

    ###########################################


    ########################################### Relations

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    ###########################################
}
