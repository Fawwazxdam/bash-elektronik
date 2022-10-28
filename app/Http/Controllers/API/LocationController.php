<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function provinces(Request $request)
    {
        return Province::all();
    }

    public function regencies(Request $request, $provinces_id)
    {
        return Regency::where('province_id', $provinces_id)->get();
    }
    
    // public function villages(Request $request, $regency_id)
    // {
    //     return Village::where('regency_id', $regency_id)->get();
    // }
}
