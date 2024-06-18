<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitaisDocumento extends Model
{
    use HasFactory;
    protected $table = "hospitais_documentos";
    protected $fillable = [
        'documento',
        'documentos_id',
        'hospitais_id',
    ];
}
