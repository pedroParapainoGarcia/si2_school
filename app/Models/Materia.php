<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $fillable = [    
        'name',
         
    ];
    
    public function asignacionmateria()
    {
        return $this->hasMany(AsignacionMateria::class, 'materia_id');
    }
     
}
