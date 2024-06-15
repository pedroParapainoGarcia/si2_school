<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    protected $fillable = [    
        'grado',       
        'nivel_id',       
    ]; 

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }
    

    public function paralelo()
    {
        return $this->hasMany(Paralelo::class, 'grado_id');
    }
}
