<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [    
        'numero',       
        'tipo',   
        'capacidad',     
        'colegio_id', 
    ]; 

    public function colegio()
    {
        return $this->belongsTo(Colegio::class, 'colegio_id');
    }
    
    public function horario()
    {
        return $this->hasMany(Horario::class, 'aula_id');
    }
}
