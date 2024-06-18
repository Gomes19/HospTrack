<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalAreaHospital extends Model
{
    protected $table = "hospital_area_hospitais";

    /*
   +-----------------------------+
   | Model fillable atributes    |
   |                             |
   +-----------------------------+                               
   */
   protected $fillable =[ 
        'hospital_id',
        'hospital_area_id'
    ];
   /*
   +-----------------------------+
   | Model validation rules      |
   |                             |
   +-----------------------------+                               
   */
    use HasFactory;
}
