<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    //use HasFactory;
    protected $table = 'administradors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cargo',
        'colegio_id',
    ];

    //relacion de agregacion con usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id');
    }
    //Relación de muchos a uno con el Colegio (correcta)
    public function colegios()
    {
        return $this->belongsTo(Colegio::class, 'colegio_id');//Utilice 'colegio_id' para clave externa
    }
}
