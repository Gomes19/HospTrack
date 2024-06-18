<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroPonto extends Model
{
    use HasFactory;
    protected $fillable = [
        'medicos_id',
        'entrada',
        'saida',
    ];

    public function medicos(){
        return $this->belongsTo(Medico::class,'medicos_id', 'id');
    }
}
