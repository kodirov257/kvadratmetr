<?php

namespace App\Helpers;

use App\Entity\Category;
use App\Entity\Region;
use Illuminate\Support\Collection;

class ProjectHelper
{
    public static function getCategoryList(): array
    {
        /* @var $category Category */
        $categories = Category::defaultOrder()->withDepth()->get();
        $categoryIds = [];
        foreach ($categories as $category) {
            $name = '';
            for ($i = 0; $i < $category->depth; $i++) {
                $name .= '— ';
            }
            $categoryIds[$category->id] = $name . $category->name;
        }
        return $categoryIds;
    }

    public static function getRegionsList(): Collection
    {
        return Region::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
    }
}