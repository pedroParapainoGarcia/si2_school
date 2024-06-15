<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;
    protected $fillable = [    
        'nombre',           
    ]; 

    public function horario()
    {
        return $this->hasMany(Horario::class, 'dia_id');
    }
}
