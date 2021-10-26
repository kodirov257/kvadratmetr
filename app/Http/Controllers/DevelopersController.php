<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Region;
use App\Helpers\LanguageHelper;

class DevelopersController extends Controller
{
    public function index()
    {
        return view('clients.developers');
    }

    public function show()
    {
        return view('clients.developer');
    }
}
