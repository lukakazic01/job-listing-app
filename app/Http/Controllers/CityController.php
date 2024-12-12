<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
     public function __invoke()
    {
        return City::all()->map(fn ($city) => ['value' => $city->id, 'label' => $city->name] );
    }
}
