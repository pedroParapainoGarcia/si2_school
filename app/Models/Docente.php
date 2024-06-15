<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [        
        'especialidad',
        'nivelFormacion',     
                       
    ];

    //relacion de agregacion con usuarios
    public function usuario()
    {
       return $this->belongsTo(User::class,'id');
    } 

    public function materia()
    {
        return $this->hasMany(Materia::class, 'docente_id');
    }    
    
    public function paralelo()
    {
        return $this->hasMany(Paralelo::class, 'docente_id');
    }
    
    public function asignacionmateria()
    {
        return $this->hasMany(AsignacionMateria::class, 'docente_id');
    }
     
    
}
