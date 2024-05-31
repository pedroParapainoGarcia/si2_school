<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

   
    protected $fillable = [       
        'nombre',
        'apellidoPaterno',
        'apellidoPaterno',
        'ci',
        'fechaNacimiento',
        'telefono',
        'sexo',        
        'email',
        'password',
        'type',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

      // Relación de pertenencia con Administrador
    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'id');
    }

    // Relación de pertenencia con PadreDeFamilia
    public function padre_de_familia()
    {
        return $this->hasOne(PadreDeFamilia::class, 'id');
    }

    // Relación de pertenencia con EStudiante
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'id');
    }
    // Relación de pertenencia con Docente
    public function docente()
    {
        return $this->hasOne(Docente::class, 'id');
    }

    public function colegio()
    {
        return $this->hasOne(Colegio::class, 'id');
    }


   
}
