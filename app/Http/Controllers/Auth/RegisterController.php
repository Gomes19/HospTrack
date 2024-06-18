<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\FolderUploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Documento;
use App\Models\HospitaisDocumento;
use App\Models\Hospital;
use App\Models\HospitalAreaHospital;
use App\Models\HospitalServico;
use App\Models\HospitalServicoHospital;
use App\Models\UserHospital;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\HospitalArea;
use App\Models\TipoHospital;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $data['hospital_areas'] = HospitalArea::all();
        $data['hospital_servicos'] = HospitalServico::all();
        $data['hospital_tipos'] = TipoHospital::all();

        return view('auth.register', $data);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return  Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'hospital_name' => ['required', 'string', 'max:255'],
            'hospital_type' => ['required'],
            'hospital_area' => ['required'],
            'hospital_servico' => ['required'],
            'logotipo' => 'required', 'image:png,jpg, jpeg',
            'documento' => 'required', 'file',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        //if ($validator->fails()) {
         //   dd($validator->errors()->all());
        //}
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'it_tipo_utilizador' => 2
        
        ]);

        $imgPath = FolderUploadHelper::uploadFile($data['logotipo'], "imagens");
        $documentoPath = FolderUploadHelper::uploadFile($data['documento'], "documentos");
        //dd($imgPath);
        $hospital = Hospital::create([
            'nome' =>$data['hospital_name'],
            'logotipo' =>$imgPath,
            'descricao' =>$data['descricao'],
            'long' =>$data['long'],
            'tipo_hospitais_id' => $data['hospital_type'],
            'endereco' =>$data['endereco'],
            'lat' =>$data['lat'],
        ]);

        $documeto = Documento::create([
            'documento' =>$documentoPath,
        ]);
        //dd($data['hospital_area']);
        foreach ($data['hospital_area'] as $hospital_area_id) 
        {
            //dd($hospital->id , $hospital_area_id);
            $hospitalArea = HospitalAreaHospital::create([
                'hospital_id' => $hospital->id,
                'hospital_area_id' => $hospital_area_id,
            ]);
        }

        foreach ($data['hospital_servico'] as $hospital_servico_id) 
        {
            //dd($hospital->id , $hospital_servico_id);
            $hospitalServico = HospitalServicoHospital::create([
                'hospital_id' => $hospital->id,
                'hospital_servico_id' => $hospital_servico_id,
            ]);
        }
       
        $hospitalDocumento = HospitaisDocumento::create([
            'documentos_id' => $documeto->id,
            'hospitais_id' => $hospital->id, 
        ]);

        $userHospital = UserHospital::create([
            'cargo' => 0,
            'user_id' => $user->id,
            'hospital_id' => $hospital->id,
        ]);
        return $user;
    }
}
