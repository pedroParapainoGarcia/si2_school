<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionMateria extends Model
{
    
    use HasFactory;
    protected $fillable = [  
       'docente_id',
       'materia_id',
    ];
}
