<?php

namespace App\Entity\Projects;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
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
 * @property User $createdBy
 * @property User $updatedBy
 */
class Facility extends BaseModel
{
    protected $table = 'project_facilities';

    public $timestamps = false;

    protected $fillable = ['name_uz', 'name_ru', 'name_en', 'icon', 'comment'];


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
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
