<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;
    protected $fillable = [    
        'nombreGestion',
        'fechaHoraCreacion',
         'estado',
       
    ];
    public function nivel()
    {
        return $this->hasMany(Nivel::class, 'gestion_id');
    }
}
