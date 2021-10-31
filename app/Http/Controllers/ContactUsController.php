<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Project\Developer;
use App\Entity\Region;
use App\Helpers\LanguageHelper;

class ContactUsController extends Controller
{
    public function index()
    {
//        $developer = Developer::
        return view('clients.contact-us');
    }
}
