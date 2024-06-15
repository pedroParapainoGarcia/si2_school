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

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_id');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }

    public function horario()
    {
        return $this->hasMany(Horario::class, 'docentemateria_id');
    }
}
