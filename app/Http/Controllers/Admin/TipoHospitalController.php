<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TipoHospitalRequest;
use Illuminate\Http\Request;
use App\Models\TipoHospital;
use DB;
class TipoHospitalController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tipoHospital = TipoHospital::all();
        return view("admin.hospital_type.index", compact("tipoHospital"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.tipo_hospital.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoHospitalRequest $request)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $tipoHospital = TipoHospital::create($request->all());
            DB::commit();
            return redirect()->back()->with("success", "Tipo de Hospital cadastrado com suceso!");
        } catch (\Throwable $th) {
            //dd($th);
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $tipoHospital = TipoHospital::find($id);
        return view("admin.tipo_hospital.show", compact("tipoHospital"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tipoHospital = TipoHospital::find($id);
        return view("admin.tipo_hospital.edit", compact("tipoHospital"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $tipoHospital = TipoHospital::find($id)->update($request->all());
            DB::commit();
            return redirect()->back()->with("succes", "Tipo de Hospital Editado com suceso!" );
     
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
         }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $tipoHospital = TipoHospital::destroy($id);
            DB::commit();
            return redirect()->back()->with("success", "Tipo de Hospital Eliminado com suceso!" );
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
}
