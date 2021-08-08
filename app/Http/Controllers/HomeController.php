<?php

namespace App\Http\Controllers;

use App\Entity\Projects\Category;
use App\Entity\Region;
use App\Helpers\LanguageHelper;

class HomeController extends Controller
{
    public function index()
    {
        $regions = Region::roots()->orderBy('name_' . LanguageHelper::getCurrentLanguagePrefix())->getModels();

        $categories = Category::whereIsRoot()->defaultOrder()->getModels();

        return view('home', compact('regions', 'categories'));
    }
}
