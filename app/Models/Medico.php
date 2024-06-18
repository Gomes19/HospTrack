<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'genero',
        'vc_path',
        'especialidades_id',
        'areas_id',
        'hospitais_id',
    ];

    public function hospital(){
        return $this->belongsTo(Hospital::class, 'hospitais_id','id');
    }
    public function especialidade(){
        return $this->belongsTo(Especialidade::class, 'especialidades_id','id');
    }
    public function area(){
        return $this->belongsTo(HospitalArea::class, 'areas_id','id');
    }
    public function livroPontos(){
        return $this->hasMany(LivroPonto::class, 'medicos_id','id');
    }
}
