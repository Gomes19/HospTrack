<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalServico extends Model
{
    use HasFactory;
    protected $fillable = [
        'vc_nome',
        'hospital_area_id'
    ];
    public function hospital(){

        return $this->belongsToMany(Hospital::class, 'hospital_servico_hospitais', 'hospital_servico_id', 'hospital_id');
    }
    public function area(){

        return $this->belongsTo(HospitalArea::class, 'hospital_area_id', 'id');
    }
}
