<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'nro_rude',
        'nivel_id',
        'paralelo_id',         
                
    ];
    
    //relacion de agregacion con usuario
    public function usuario()
    {
       return $this->belongsTo(User::class,'id');
    } 

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    } 
    public function paralelo()
    {
        return $this->belongsTo(Paralelo::class, 'paralelo_id');
    }

    public function tutorestudiante()
    {
        return $this->hasMany(TutorEstudiante::class, 'estudiante_id');
    }
   
     
}
