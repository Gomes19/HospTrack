<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Models\HospitalArea;
use App\Models\HospitalServicoHospital;

class HospitalController extends Controller
{
    //
    public function index(Request $request, HospitalArea $hospitalArea)
    {
        
        
        if($hospitalArea->id) 
        {
            $hospitais = Hospital::join('hospital_area_hospitais', 'hospitais.id', 'hospital_area_hospitais.hospital_id')
            ->join('hospital_areas', 'hospital_areas.id', 'hospital_area_hospitais.hospital_area_id',)
            ->where('hospital_areas.id', $hospitalArea->id)
            ->where('estado', 1)
            ->get() ;
        }
        elseif($request->search)
        {
            
            $hospitais = HospitalServicoHospital::join('hospitais','hospital_servico_hospitais.hospital_id','hospitais.id')
            ->join('hospital_servicos','hospital_servico_hospitais.hospital_servico_id','hospital_servicos.id')
            ->where('hospital_servicos.vc_nome', 'like', '%' . $request->search . '%')
            ->where('hospitais.estado', 1)
            ->select('hospitais.*')
            ->get();
            //where('nome', 'LIKE',"%$request->search%")->get();
            //dd($hospitais);
        }
        else
        {
            $hospitais = Hospital::where('estado', 1)->get();
        }
        // dd($hospitais);
       
        return view("site.hospital.index", compact("hospitais","hospitalArea"));
    }

    public function show(Hospital $hospital)
    {
        return view("site.hospital.single_hospital", compact("hospital"));
    }
}
