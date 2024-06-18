<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalArea;
use Illuminate\Http\Request;
use App\Http\Requests\MedicoRequest;
use App\Http\Requests\MedicoUpdateRequest;
use App\Models\Medico;
use App\Models\Hospital;
use App\Models\Especialidade;
use App\Helpers\FolderUploadHelper;
use DB;
use Illuminate\Support\Facades\Auth;
class MedicoController extends Controller
{
    public function __construct(
        protected Medico $repository,
        protected  $image = new FolderUploadHelper()
    ){

    }
    public function index()
    {
        if(Auth::user()->it_tipo_utilizador == 1)
        {
            $data['medicos']=$this->repository->get();
            $data['especialidades'] = Especialidade::get();
            $data['areas'] = HospitalArea::get();
            $data['hospitais'] = Hospital::get();
        }
        else{
            $data['medicos']= Auth::user()->hospital()->first()->medicos()->get();
            $data['especialidades'] = Especialidade::get();
            $data['areas'] = HospitalArea::get();
            $data['hospitais'] = Hospital::get();

        }
       
        return view("admin.medico.index",$data);
    }
    public function store(MedicoRequest $request)
    {
        DB::beginTransaction();
        try {
            //code...
            $data=$this->repository->create($request->all());
            $caminho=$this->image->uploadFile($request->vc_path, "imagens");
            $data->update([
                'vc_path'=>$caminho
            ]);
            DB::commit();
            return redirect()->back()->with('success','Médico Cadastrado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Erro ao cadastrar medico');   
        }
       
    }
    public function show(Medico $medico)
    {
        try {
            //code...
            return $medico;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
    public function update(MedicoUpdateRequest $request, Medico $medico)
    {
        DB::beginTransaction();
        try {
            $medico->update($request->all());
            if($request->vc_path){
                $caminho = $this->image->uploadFile($request->vc_path, "imagens");
                $medico->update([
                'vc_path'=>$caminho
            ]);
            }
            DB::commit();   
            return redirect()->back()->with('success','Médico editado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Erro ao editar medico');   
        }
    }
    public function delete(Medico $medico)
    {
        DB::beginTransaction();
        try {
            //code...
            $medico->delete();
            DB::commit();  
            return redirect()->back()->with('success','Médico eliminado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Erro ao eliminar medico');   
        }

    }
}
