<?php

namespace App\Helpers;

use App\Entity\Category;
use App\Entity\Projects\Project\Project;
use App\Entity\Region;
use Illuminate\Support\Collection;

class ProjectHelper
{

    public static function getStatusLabel($status): string
    {
        switch ($status) {
            case Project::STATUS_DRAFT:
                return '<span class="badge badge-secondary">' . trans('adminlte.draft') . '</span>';
            case Project::STATUS_MODERATION:
                return '<span class="badge badge-warning">' . trans('adminlte.project.moderation') . '</span>';
            case Project::STATUS_ACTIVE:
                return '<span class="badge badge-success">' . trans('adminlte.project.active') . '</span>';
            case Project::STATUS_CLOSED:
                return '<span class="badge badge-danger">' . trans('adminlte.project.closed') . '</span>';
            default:
                return '<span class="badge badge-danger">Default</span>';
        }
    }
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