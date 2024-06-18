<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HospitalArea;

class HomeController extends Controller
{
    //
    public function index()
    {
        $hospital_areas = HospitalArea::all();
        return view("site.home.index", compact("hospital_areas"));
    }
}
