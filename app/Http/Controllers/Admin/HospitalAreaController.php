<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\HospitalAreaRequest;
use Illuminate\Http\Request;
use App\Models\HospitalArea;
use DB;
class HospitalAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hospitalAreas = HospitalArea::all();
        return view("admin.hospital_area.index", compact("hospitalAreas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.hospital_area.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HospitalAreaRequest $request)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $hospitalArea = HospitalArea::create($request->all());
            DB::commit();
            return redirect()->back()->with("success", "Área de Hospital cadastrado com sucesso!");
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
            return redirect()->back()->with("error", $th->getMessage());
        }
         }

    /**
     * Display the specified resource.
     */
    public function show(HospitalArea $hospitalArea)
    {
        //
        return view("admin.hospital_area.show", compact("hospitalArea"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HospitalArea $hospitalArea)
    {
        //
        return view("admin.hospital_area.edit", compact("hospitalArea"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HospitalArea $hospitalArea)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $hospitalArea->update($request->all());
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
    public function delete(HospitalArea $hospitalArea)
    {
        //
        DB::beginTransaction();
        try {
           // dd($hospitalArea->id);
            //code...
            $hospitalArea->delete();
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
