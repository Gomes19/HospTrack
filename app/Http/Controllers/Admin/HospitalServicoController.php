<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\HospitalServicoRequest;
use Illuminate\Http\Request;
use App\Models\HospitalServico;
use  App\Models\HospitalArea;
use DB;
class HospitalServicoController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $areas = HospitalArea::get();
        $hospitaisServicos = HospitalServico::all();
        return view("admin.hospital_service.index", compact("hospitaisServicos","areas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.hospital_servico.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HospitalServicoRequest $request)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            //dd($request);
            $hospitaisServicos = HospitalServico::create($request->all());
            DB::commit();
            return redirect()->back()->with("success", "Serviço de Hospital cadastrado com suceso!");
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with("error", 'Erro ao cadastrr Serviço de Hospital');
        }
         }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $hospitaisServicos = HospitalServico::find($id);
        return view("admin.hospital_servico.show", compact("hospitaisServicos"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $hospitaisServicos = HospitalServico::find($id);
        return view("admin.hospital_servico.edit", compact("hospitaisServicos"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HospitalServico $hospitaisServicos)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $hospitaisServicos->update($request->all());
            DB::commit();
            return redirect()->back()->with("success", "Serviço de Hospital Editado com suceso!" );
     
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with("error", 'Erro ao editar servico de hospital');
        }
         }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(HospitalServico $hospitaisServicos)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $hospitaisServicos->delete();
            DB::commit();
            return redirect()->back()->with("success", "Serviço de Hospital Eliminado com suceso!" );
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with("error", 'Erro ao eliminar servico de hospital');
        }
    }
}
