<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHospital extends Model
{
    use HasFactory;
    protected $table = "tipo_hospitais";

    protected $fillable = [
        'vc_nome'
    ];
}
