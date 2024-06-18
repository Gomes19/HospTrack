<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HospitalArea;

class HospitalAreaController extends Controller
{
    //
    public function index()
    {
        $hospitalArea = HospitalArea::all();
        return view("site.hospitalArea.index", compact("hospitalArea"));
    }
}
