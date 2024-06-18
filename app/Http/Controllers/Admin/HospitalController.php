<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Helpers\FolderUploadHelper;
use App\Http\Requests\HospitalRequest;
use App\Http\Requests\HosptitalUpdateRequest;
use App\Models\Documento;
use App\Models\HospitaisDocumento;
use App\Models\HospitalServico;
use App\Models\TipoHospital;
use App\Models\User;
use App\Models\UserHospital;
use App\Models\HospitalArea;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\HospitalAreaHospital;
use App\Models\HospitalServicoHospital;
use Illuminate\Support\Facades\Auth;
use DB;
class HospitalController extends Controller
{
    protected $folderUploadHelper;
    public function __construct(){
       $this->folderUploadHelper = new FolderUploadHelper();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(Auth::user()->it_tipo_utilizador == 1 )
        {
            $hospitais = Hospital::all();
            $tipoHospitais = TipoHospital::all();
            $areaHospitais = HospitalArea::all();
            $servioHospitais = HospitalServico::all();
            $data['hospital_areas'] = HospitalArea::all();
            $data['hospital_servicos'] = HospitalServico::all();
            $data['hospital_tipos'] = TipoHospital::all();
            $data['users'] = User::where('it_tipo_utilizador', 2)->get();

        }elseif( Auth::user()->it_tipo_utilizador == 2 || Auth::user()->hospital()->first()->cargo == 0)
        {
            $data['hospital_areas'] = HospitalArea::all();
            $data['hospital_servicos'] = HospitalServico::all();
            $data['hospital_tipos'] = TipoHospital::all();
            $data['users'] = User::where('it_tipo_utilizador', 2)->get();
            $hospitais = Auth::user()->hospital()->first();
            $areaHospitais = HospitalArea::all();
            $tipoHospitais = TipoHospital::all();
            $servioHospitais = HospitalServico::all();

        } else
        {
            $data['hospital_areas'] = [];
            $data['users'] = [];
            $data['hospital_servicos'] = [];
            $data['hospital_tipos'] = [];
            $hospitais = [];
            $areaHospitais = [];
            $tipoHospitais = [];
            $users = [];
            $servioHospitais = [];
        }        

       
        return view("admin.hospital.index", compact("hospitais", "servioHospitais","tipoHospitais", "areaHospitais"), $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(Auth::user()->it_tipo_utilizador == 1 )
        {
            $hospitais = Hospital::all();
            $tipoHospitais = TipoHospital::all();
            $areaHospitais = HospitalArea::all();
            $servioHospitais = HospitalServico::all();
            $data['hospital_areas'] = HospitalArea::all();
            $data['hospital_servicos'] = HospitalServico::all();
            $data['hospital_tipos'] = TipoHospital::all();
            $data['users'] = User::where('it_tipo_utilizador', 2)->get();

        }elseif( Auth::user()->it_tipo_utilizador == 2 || Auth::user()->hospital()->first()->cargo == 0)
        {
            $data['hospital_areas'] = HospitalArea::all();
            $data['hospital_servicos'] = HospitalServico::all();
            $data['hospital_tipos'] = TipoHospital::all();
            $data['users'] = User::where('it_tipo_utilizador', 2)->get();
            $hospitais = Auth::user()->hospital()->first();
            $areaHospitais = HospitalArea::all();
            $tipoHospitais = TipoHospital::all();
            $servioHospitais = HospitalServico::all();

        } else
        {
            $data['hospital_areas'] = [];
            $data['users'] = [];
            $data['hospital_servicos'] = [];
            $data['hospital_tipos'] = [];
            $hospitais = [];
            $areaHospitais = [];
            $tipoHospitais = [];
            $users = [];
            $servioHospitais = [];
        }        

       
        return view("admin.hospital.create", compact("hospitais", "servioHospitais","tipoHospitais", "areaHospitais"), $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HospitalRequest $data)
    {
        //
        DB::beginTransaction();
        try {
            //code...
        //dd($data);
           
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
            'user_id' => $data['user_id'],
            'hospital_id' => $hospital->id,
        ]);
            DB::commit();
            return redirect()->back()->with("success", "Hospital cadastrado com sucesso!");
        } catch (\Throwable $th) {
            //throw $th;
            dd($data);
            DB::rollBack(); 
            return redirect()->back()->with("error", $th->getMessage());
        }
         }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospitais)
    {
        //
        return view("admin.hospital.show", compact("hospitais"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospitais)
    {
        //
        return view("admin.hospital.edit", compact("hospitais"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HosptitalUpdateRequest $request, Hospital $hospital)
    {
        //dd($hospital);
        DB::beginTransaction();
        try {
            //code...
            
            $imgPath = $this->folderUploadHelper->uploadFile($request->logotipo, "imagens");
            $documentoPath = $this->folderUploadHelper->uploadFile($request->logotipo, "imagens");
           
            $hospital->update([
                'nome' => $request->hospital_name,
                'descricao' => $request->descricao,
                'long' => $request->long,
                'endereco' => $request->endereco,
                'lat' => $request->lat,
                'tipo_hospitais_id' =>$request->hospital_type
            ]);
            if($imgPath)
            {
                $hospital->update([
                    'logotipo' =>$imgPath,
                ]);

            } 
            if($documentoPath)
            {
                $documento = Documento::create([
                    'documento' =>  $documentoPath 
                ]);
                HospitaisDocumento::create([
                    'documentos_id' => $documento->id,
                    'hospitais_id' => $hospital->id,
                ]);
            } 
            foreach ($request->hospital_area as $hospital_area_id) 
        {
            $isTrue = HospitalAreaHospital::where('hospital_id', $hospital->id)
            ->where('hospital_area_id', $hospital_area_id)->get();
            //dd($hospital->id , $hospital_area_id);
            if(!$isTrue){
            
                $hospitalArea = HospitalAreaHospital::create([
                    'hospital_id' => $hospital->id,
                    'hospital_area_id' => $hospital_area_id,
                ]);

            }

           
        }

        foreach ($request->hospital_servico as $hospital_servico_id) 
        {
            //dd($hospital->id , $hospital_servico_id);
            $isTrue = HospitalServicoHospital::where('hospital_id',$hospital->id )
            ->where('hospital_servico_id',$hospital_servico_id)->get();
            if(!$isTrue)
            {
                $hospitalServico = HospitalServicoHospital::create([
                    'hospital_id' => $hospital->id,
                    'hospital_servico_id' => $hospital_servico_id,
                ]);
            }
           
        }
            DB::commit();
            return redirect()->back()->with("success", "Hospital Editado com suceso!" );
     
        } catch (\Throwable $th) {
            //throw $th;
            //dd($th);
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
         }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Hospital $hospital)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $hospital->delete();
            DB::commit();
            return redirect()->back()->with("success", "Hospital Eliminado com suceso!" );
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

    public function aprovar(Hospital $hospital)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $hospital->update([
                'estado' => 1
            ]);
            DB::commit();
            return redirect()->back()->with("success", "Hospital Aprovado com suceso!" );
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
    public function reprovar(Hospital $hospital)
    {
        //
        DB::beginTransaction();
        try {
            //code...
            $hospital->update([
                'estado' => 2
            ]);
            DB::commit();
            return redirect()->back()->with("success", "Hospital Reprovado com suceso!");
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
    
}
