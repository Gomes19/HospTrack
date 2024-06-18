<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Medico;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->it_tipo_utilizador == 1 )
        {
            $data['totalUsers'] = User::count();
            $data['totalMedicos'] = Medico::count();
            $data['totalHospitais'] = Hospital::count();
        }
        else
        {
            if(Auth::user()->hospital()->first())
            {
                $data['totalUsers'] = Auth::user()->hospital()->first()->user()->where('cargo','!=', 0)->count(); 
                $data['totalMedicos'] =  Auth::user()->hospital()->first()->medicos()->count();
                $data['totalServicos'] = Auth::user()->hospital()->first()->servicos()->count();;
            }
            else
            {
                $data['totalUsers'] = 'N/A'; 
                $data['totalMedicos'] =  'N/A';
                $data['totalHospitais'] = 'N/A';
            }
           
        }
       //dd($data['totalUsers']);
        return view('admin.dashboard.index', $data);
    }
}
