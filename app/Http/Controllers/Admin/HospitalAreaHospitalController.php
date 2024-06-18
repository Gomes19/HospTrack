<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalAreaHospital;
use Illuminate\Http\Request;
use App\Models\HospitalArea;
use App\Models\Hospital;
use App\Http\Requests\HospitalAreaHospitalRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class HospitalAreaHospitalController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hospitalAreas = Auth::user()->hospital()->first()->areas()->get();
        //$hospitalAreas = HospitalArea::all();
        return view("admin.hospital_area.index", compact("hospitalAreas"));
    }

    public function store(HospitalAreaHospitalRequest $request)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $hospitalArea = HospitalAreaHospital::create($request->all());
            DB::commit();
            return redirect()->back()->with("success", "Área de Hospital cadastrado com sucesso!");
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
            return redirect()->back()->with("error", $th->getMessage());
        }
         }

    /**
     * Update the specified resource in storage.
     */
    public function update(HospitalAreaHospitalRequest $request, HospitalArea $hospitalArea, Hospital $hospital)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            HospitalAreaHospital::where('hospital_id', $hospital->id)
                ->where('hospital_area_id',$hospitalArea->id)
                ->update($request->all());
            DB::commit();
            return redirect()->back()->with("success", "Área de Hospital Editado com sucesso!" );
     
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
         }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(HospitalArea $hospitalArea, Hospital $hospital)
    {
        //
        DB::beginTransaction();
        try {
           // dd($hospitalArea->id);
            //code...
            HospitalAreaHospital::where('hospital_id', $hospital->id)
                ->where('hospital_area_id',$hospitalArea->id)
                ->delete();
            //HospitalArea::destroy($hospitalArea->id);
            DB::commit();
          
            return redirect()->back()->with("success", "Área de Hospital Eliminado com sucesso!" );
        } catch (\Throwable $th) {
            //dd($th);
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

}
