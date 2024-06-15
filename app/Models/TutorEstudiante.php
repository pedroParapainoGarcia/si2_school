<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorEstudiante extends Model
{
    use HasFactory;
    protected $fillable = [  
        'tutor_id',
        'estudiante_id',
        'parentesco',
     ];
 
     public function padredefamilia()
     {
         return $this->belongsTo(PadreDeFamilia::class, 'tutor_id');
     }
 
     public function estudiante()
     {
         return $this->belongsTo(Estudiante::class, 'estudiante_id');
     }
 
}
