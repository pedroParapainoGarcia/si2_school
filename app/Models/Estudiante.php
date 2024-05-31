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
        'grado_id',
        'padre_id',       
                
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
    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id');
    }

    public function padreDeFamilia()
    {
        return $this->belongsTo(PadreDeFamilia::class, 'padre_id');
    }

     
}
