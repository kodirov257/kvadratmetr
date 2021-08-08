<?php

use App\Entity\Projects\Category;
use App\Entity\Page;
use App\Entity\Region;
use App\Http\Router\ProjectsPath;
use App\Http\Router\PagePath;

if (! function_exists('projects_path')) {

    function projects_path(?Region $region, ?Category $category)
    {
        return app()->make(ProjectsPath::class)
            ->withRegion($region)
            ->withCategory($category);
    }
}

if (! function_exists('page_path')) {

    function page_path(Page $page)
    {
        return app()->make(PagePath::class)
            ->withPage($page);
    }
}