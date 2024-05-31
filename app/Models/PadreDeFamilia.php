<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PadreDeFamilia extends Model
{

   protected $primaryKey = 'id';
   protected $fillable = [
      'ocupacionLaboral',
      'mayorGradoInstruccion',
      'tipo',
      'estado',
   ];

   //relacion de agregacion con persona
   public function usuario()
   {
      return $this->belongsTo(User::class, 'id');
   }

   public function estudiante()
   {
      return $this->hasMany(Estudiante::class, 'padre_id');
   }
}
