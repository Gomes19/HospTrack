<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class TesteController extends Controller
{
    //
    public function index(){
        $data['users']=User::get();

        return view('index',$data);
    }
    public function store(Request $req){
        User::create([
            'name'=>$req->nome,
            'email'=>$req->email,
            'password'=>$req->senha,
        ]);

        return redirect()->back();
    }
    public function delete($id){
        User::destroy($id);
        return redirect()->back();
    }

}
