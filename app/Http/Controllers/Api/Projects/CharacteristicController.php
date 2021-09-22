<?php

namespace App\Http\Controllers\Api\Projects;

use App\Entity\Projects\Characteristic;
use App\Http\Controllers\Controller;
use App\Http\Resources\Projects\CharacteristicsResource;
use Illuminate\Http\Request;

class CharacteristicController extends Controller
{
    public function show(Characteristic $characteristic)
    {
        return new CharacteristicsResource($characteristic);
    }
}
