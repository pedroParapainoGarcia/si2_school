<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $fillable = [    
        'turno',
        'dia_id',        
        'periodo_id',      
        'intervalo_id', 
        'aula_id',      
        'paralelo_id', 
        'docentemateria_id', 
    ]; 

    public function dia()
    {
        return $this->belongsTo(Dia::class, 'dia_id');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }

    public function intervalo()
    {
        return $this->belongsTo(Intervalo::class, 'intervalo_id');
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'aula_id');
    }

    public function paralelo()
    {
        return $this->belongsTo(Paralelo::class, 'paralelo_id');
    }
   
    public function docentemateria()
    {
        return $this->belongsTo(AsignacionMateria::class, 'docentemateria_id');
    }
}
