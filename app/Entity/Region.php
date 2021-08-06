<?php

namespace App\Entity;

use App\Helpers\LanguageHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $slug
 * @property int|null $parent_id
 *
 * @property string $name
 * @property Region $parent
 * @property Region[] $children
 *
 * @method Builder roots()
 */
class Region extends Model
{
    protected $fillable = ['name_uz', 'name_ru', 'name_en', 'slug', 'parent_id'];

    public function getPath(): string
    {
        return ($this->parent ? $this->parent->getPath() . '/' : '') . $this->slug;
    }

    public function getAddress(): string
    {
        return ($this->parent ? $this->parent->getAddress() . ', ' : '') . $this->name;
    }


    ########################################### Mutators

    public function scopeRoots(Builder $query)
    {
        return $query->where('parent_id', null);
    }

    ###########################################


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return htmlspecialchars_decode(LanguageHelper::getName($this));
    }

    ###########################################


    ########################################### Relations

    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }

    ###########################################
}
