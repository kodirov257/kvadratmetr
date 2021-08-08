<?php

namespace App\Entity\Projects;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $slug
 * @property integer $left
 * @property integer $right
 * @property int|null $parent_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $name
 * @property int $depth
 * @property Category $parent
 * @property Category[] $children
 * @property Characteristic[] $characteristics
 * @property User $createdBy
 * @property User $updatedBy
 */
class Category extends BaseModel
{
    use NodeTrait;

    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = ['name_uz', 'name_ru', 'name_en', 'slug', 'parent_id'];

    public function getPath(): string
    {
        return implode('/', array_merge($this->ancestors()->defaultOrder()->pluck('slug')->toArray(), [$this->slug]));
    }

    public function parentCharacteristics(): array
    {
        return $this->parent ? $this->parent->allCharacteristics() : [];
    }

    /**
     * @return Characteristic[]
     */
    public function allCharacteristics(): array
    {
        return array_merge($this->parentCharacteristics(), $this->characteristics()->orderBy('sort')->getModels());
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return htmlspecialchars_decode(LanguageHelper::getName($this));
    }

    ###########################################


    ########################################### For Nested Set

    public function getLftName(): string
    {
        return 'left';
    }

    public function getRgtName(): string
    {
        return 'right';
    }

    ###########################################


    ########################################### Relations

    public function characteristics()
    {
        return $this->hasMany(Characteristic::class, 'category_id', 'id');
    }

    ###########################################
}
