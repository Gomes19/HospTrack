<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\HospitalServicoHospital;
use Illuminate\Http\Request;
use App\Models\HospitalServico;
use App\Models\HospitalArea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HospitalServicoHospitalRequest;


class servicoHospitalServicoController extends Controller
{
    //
    public function index()
    {
        //$hospitaisServicos = HospitalServico::get();
        $hospitaisServicos = Auth::user()->hospital()->first()->servicos()->get();
        $areas = HospitalArea::get();
        return view('admin.hospital_service.index', compact('hospitaisServicos', 'areas'));
    }
    public function store(HospitalServicoHospitalRequest $request)
    {
        DB::beginTransaction();
        try {
            //code...
            $data = HospitalServicoHospital::create($request->all());
            DB::commit();
            return redirect()->back()->with('success','Servico cadastrado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Erro ao cadastrar servico');   
        }
       
    }
    public function update(HospitalServicoHospitalRequest $request)
    {
        DB::beginTransaction();
        try {
            HospitalServicoHospital::update($request->all());
            return redirect()->back()->with('success','Servico editado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Erro ao cadastrar servico');   
        }
    }
    public function delete(HospitalServico $hospitalServico, Hospital $hospital)
    {
        DB::beginTransaction();
        try {
            //code...
            HospitalServicoHospital::where('hospital_id', $hospital->id)
                ->where('hospital_servico_id', $hospitalServico->id)
                ->delete();
            return redirect()->back()->with('success','Servico eliminado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Erro ao cadastrar servico');   
        }

    }
}
