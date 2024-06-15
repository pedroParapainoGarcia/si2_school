<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paralelo extends Model
{
    use HasFactory;
    protected $fillable = [    
        'nombre',
        'cupo',        
        'grado_id',      
        'docente_id', 
        'colegio_id',
    ]; 

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_id');
    }

    public function horario()
    {
        return $this->hasMany(Horario::class, 'paralelo_id');
    }

    public function estudiante()
    {
        return $this->hasMany(Estudiante::class, 'paralelo_id');
    }

    
}
