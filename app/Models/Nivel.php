<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $fillable = [    
        'nombre',        
        'gestion_id',       
    ];

    public function gestion()
    {
        return $this->belongsTo(Gestion::class, 'gestion_id'); 
    }
    
    public function grado()
    {
        return $this->hasMany(Grado::class, 'nivel_id');
    }

    public function estudiante()
    {
        return $this->hasMany(Estudiante::class, 'nivel_id');
    }

    public function colegio()
    {
        return $this->belongsTo(Colegio::class, 'colegio_id');
    }
}
