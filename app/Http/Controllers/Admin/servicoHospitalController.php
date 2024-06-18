<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HospitalServico;
use App\Models\HospitalArea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HospitalServicoRequest;

class servicoHospitalController extends Controller
{
    //
    public function index()
    {
        $hospitaisServicos = HospitalServico::get();
        //$hospitaisServicos = Auth::user()->hospital()->first()->servicos()->get();
        $areas = HospitalArea::get();
        return view('admin.hospital_service.index', compact('hospitaisServicos', 'areas'));
    }
    public function store(HospitalServicoRequest $request)
    {
        DB::beginTransaction();
        try {
            //code...
            $data = HospitalServico::create($request->all());
            DB::commit();
            return redirect()->back()->with('success','Servico cadastrado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            
            DB::rollback();
            return redirect()->back()->with('error','Erro ao cadastrar serviço');   
        }
       
    }
    public function update(HospitalServicoRequest $request, HospitalServico $hospitalServico)
    {
        DB::beginTransaction();
        try {
            $hospitalServico->update($request->all());
            return redirect()->back()->with('success','Servico editado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Erro ao editar serviço');   
        }
    }
    public function delete(HospitalServico $hospitalServico)
    {
        DB::beginTransaction();
        try {
            //code...
            $hospitalServico->delete();
            return redirect()->back()->with('success','Servico eliminado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Erro ao eliminar serviço');   
        }

    }
}
