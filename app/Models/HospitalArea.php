<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalArea extends Model
{
    use HasFactory;
    protected $table = "hospital_areas";
     /*
    +-----------------------------+
    | Model fillable atributes    |
    |                             |
    +-----------------------------+                               
    */
    protected $fillable =['vc_nome'];
    public function hospital(){
        return $this->belongsToMany(Hospital::class, 'hospital_area_hospitais', 'hospital_area_id', 'hospital_id');
  
    }
    public function servico(){

        return $this->hasMany(HospitalServico::class, 'id', 'hospital_area_id');
    }
}
