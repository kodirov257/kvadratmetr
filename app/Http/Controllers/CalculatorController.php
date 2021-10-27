<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Region;
use App\Helpers\LanguageHelper;

class CalculatorController extends Controller
{
    public function index()
    {

        return view('clients.calculator');
    }
}
