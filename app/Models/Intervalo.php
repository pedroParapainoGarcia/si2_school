<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervalo extends Model
{
    use HasFactory;
    protected $fillable = [    
        'horaInicio',        
        'horaFin',       
    ];

    public function horario()
    {
        return $this->hasMany(Horario::class, 'intervalo_id');
    }
}
