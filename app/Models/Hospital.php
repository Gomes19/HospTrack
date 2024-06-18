<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = "hospitais";

    protected $fillable = [
        //'users_id',
        'nome',
        'logotipo',
        'descricao',
        'estado',
        'long',
        'endereco',
        'lat',
        'tipo_hospitais_id',
    ];
    public function user(){
        return $this->belongsToMany(User::class, 'user_hospitais', 'hospital_id','user_id');
    }

    public function tipo(){
        return $this->belongsTo(TipoHospital::class, 'tipo_hospitais_id','id');
    }

    public function medicos(){
        return $this->hasMany(Medico::class, 'hospitais_id','id');
    }

    public function areas(){
        return $this->belongsToMany(HospitalArea::class, 'hospital_area_hospitais', 'hospital_id', 'hospital_area_id');
   
    }
    public function servicos(){
        return $this->belongsToMany(HospitalServico::class, 'hospital_servico_hospitais', 'hospital_id', 'hospital_servico_id');
   
    }
    public function documentos(){
        return $this->belongsToMany(Documento::class, 'hospitais_documentos', 'hospitais_id', 'documentos_id');
   
    }
}

