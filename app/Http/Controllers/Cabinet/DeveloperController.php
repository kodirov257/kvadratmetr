<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\UseCases\Projects\CharacteristicService;
use App\UseCases\Projects\DeveloperService;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
//    private $service;

//    public function __construct(DeveloperService $service)
//    {
////        dd($service);
//        $this->middleware('can:manage-own-developer');
//        $this->service = $service;
//    }
    public function index(Request $request){

//        dd($request);
        return view('developer.index');
    }

    public function create(Request $request){
//        dd('salom');
    }
}
