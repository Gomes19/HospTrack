<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHospital extends Model
{
    use HasFactory;
    protected $table = "user_hospitais";
    protected $fillable = [
        'cargo',
        'user_id',
        'hospital_id',
    ];

}
