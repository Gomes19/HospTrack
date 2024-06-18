<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EspecialidadeRequest;
use App\Models\Especialidade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class EspecialidadeController extends Controller
{
    public function __construct(
        protected Especialidade $repository
    ){

    }
    public function index(){
        $especialidades = $this->repository->get();
        return view('admin.especialidade.index', compact('especialidades'));
       
    }
    public function store(EspecialidadeRequest $request){
        DB::beginTransaction();
        try {
            //code...
            $data=$this->repository->create($request->all());
            DB::commit();
            return redirect()->back()->with('success', 'Especialidade cadastrada com sucesso');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao cadastrar especialidade');
            
        }
       
    }
    public function show(Especialidade $especialidade){
        try {
            //code...
            return $especialidade;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
        
    }
    public function update(EspecialidadeRequest $request , Especialidade $especialidade){
        DB::beginTransaction();
        try {
            //dd($especialidade);
            $especialidade->update($request->all());
            //dd($especialidade);
            DB::commit();
            return redirect()->back()->with('success', 'Especialidade editada com sucesso');
        } catch (\Throwable $th) {
            //throw $th;
            //dd($th);
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao editar especialidade');
            
        }
    }
    public function delete(Especialidade $especialidade){
        DB::beginTransaction();
        try {
            //code...
            $especialidade->delete();
            
            DB::commit();   return redirect()->back()->with('success', 'Especialidade eliminada com sucesso');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao eliminar especialidade');
            
        }

    }
}
