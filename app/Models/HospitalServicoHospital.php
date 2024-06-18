<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalServicoHospital extends Model
{
    protected $table = "hospital_servico_hospitais";
    protected $fillable = [
        "hospital_id",
        "hospital_servico_id"
    ];
    use HasFactory;
}
