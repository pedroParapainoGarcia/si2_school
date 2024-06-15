<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'codigo',
        'correo',
        'Telefono',        
        'ubicacion',       
    ];  

    public function aula()
    {
        return $this->hasMany(Aula::class, 'colegio_id');
    }
     
    public function nivel()
    {
        return $this->hasMany(Nivel::class, 'colegio_id');
    }
    
    
}
