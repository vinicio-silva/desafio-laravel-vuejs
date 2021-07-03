<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function getCidades() {
        $cidades = City::all();
        return json_encode($cidades, JSON_UNESCAPED_UNICODE );
    }
}
