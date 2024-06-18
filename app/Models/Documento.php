<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'documento',  
    ];
    public function hospital(){
        return $this->belongsToMany(Documento::class, 'hospitais_documentos', 'documentos_id', 'hospitais_id');
   
    }
}
