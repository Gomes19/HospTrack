<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserHospital;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hospital;
use App\Helpers\FolderUploadHelper as ImageUploadHelper;
use DB;

class UserController extends Controller
{
    /*
    +--------------------------------+
    |         Níveis de Acesso       |
    |________________________________|
    |                                |
    |  1- Aministrador Do Sistema    |  
    |  2 - Administrador Do Hospital |
    |  3 - Acinante De Pontos        |
    |                                |
    +--------------------------------+
    */
    public function index(){
       if(Auth::user()->it_tipo_utilizador == 1 )
       {
        $data['users'] = User::get();
        $data['hospitais'] = Hospital::get();
       }elseif( Auth::user()->it_tipo_utilizador == 2 || Auth::user()->hospital()->first()->cargo == 0)
       {
        $data['users'] = Auth::user()->hospital()->first()->user()->where('cargo', '!=', 0)->get();
       } else
       {
        $data['users'] = [];
       }                   
        // dd($users);
        return view('admin.user.index',$data);
    }

    public function perfil()
    {
       $user = Auth::user();
       return view('admin.perfil.index', compact('user'));
    }
    public function store(Request $req){
        //dd($req);
        DB::beginTransaction();
        try{
            $caminho = ImageUploadHelper::uploadFile($req->imagem, 'imagens/users');
            $user=User::create([
                'name'=>$req->name,
                'email'=>$req->email,
                'password'=>Hash::make($req->password),
                'vc_path'=>$caminho,
                'it_tipo_utilizador'=>$req->vc_tipo_utilizador
            ]);
            if($req->hospitais_id){
               $useHospital = UserHospital::create([
                'cargo' => 1,
                'user_id' => $user->id,
                'hospital_id' => $req->hospitais_id,      
               ]); 
            }
            DB::commit();
            return redirect()->back()->with('success','Usuario cadastrado com sucesso');
    
    }catch (\Throwable $th) {
        DB::rollback();
        return redirect()->back()->with("error", 'Erro ao cadastrar usuario');
    }
    }
    public function update(Request $req, User $user){
        DB::beginTransaction();
        try{
            if($req->password)
            {
                $user->update([
                    'password'=>Hash::make($req->password),
                ]);
            }

            if($req->hasFile('vc_path'))     
            {
                $caminho = ImageUploadHelper::uploadFile($req->vc_path, 'imagens/users');
                $user->update([
                    'vc_path'=>$caminho,
                ]);  
            }

            $user->update([
                'name'=>$req->name,
                'email'=>$req->email,
                'it_tipo_utilizador'=>$req->vc_tipo_utilizador,
            ]);

            if($req->hospitais_id){
                $isTrue = UserHospital::where('user_id', $user->id)
                ->where('hospital_id' , $req->hospitais_id)
                    ->get();
                if(!$isTrue)
                {
                    UserHospital::where('user_id', $user->id)->delete();
                    $useHospital = UserHospital::create([
                        'cargo' => 1,
                        'user_id' => $user->id,
                        'hospital_id' => $req->hospitais_id,      
                    ]);
                }  
            }
            DB::commit();
            return redirect()->back()->with('success','Usario editado com sucesso');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with("error", 'Erro ao editar usuario');
        }
    }
    public function delete($id){
        DB::beginTransaction();
        try{
            User::destroy($id);
            DB::commit();
            return redirect()->back()->with('success','Usario eliminado com sucesso');
        }catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao eliminar usuario');
        }
    }
}
