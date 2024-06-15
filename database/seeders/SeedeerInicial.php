<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\AsignacionMateria;
use App\Models\Aula;
use App\Models\Colegio;
use App\Models\Dia;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Intervalo;
use App\Models\Materia;
use App\Models\Nivel;
use App\Models\PadreDeFamilia;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedeerInicial extends Seeder
{

    public function run(): void
    {
        $colegio = Colegio::create([
            'name' => 'JOSAFAT SORUCO SORUCO',
            'codigo'=>'81980533',
            'correo' => 'SAFATSORUCOS@HOTMAIL.COM',
            'telefono' => '3985076',
            'ubicacion' => 'VILLA 1RO. DE MAYO',
        ]);

        // $usuarioadm = User::create([
        //     'nombre' => 'Joaquin',
        //     'apellidoPaterno' => 'Chumacero',
        //     'apellidoMaterno' => 'Antelo',
        //     'ci' => '8093807',
        //     'fechaNacimiento' => Carbon::parse('1974-08-01'),
        //     'telefono' => '73980236',
        //     'sexo' => 'M',
        //     'direccion' => 'BARRIO LINDO N°15',            
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('8093807'),
        //     'type' => 'Adm.',
        // ])->assignRole('Administrador');

        // Administrador::create([
        //     'id' => $usuarioadm->id,
        //     'cargo' => 'Director',
        //     'colegio_id'=> $colegio->id,            
        // ]);


        // $primaria1 = Grado::create([
        //     'grado' => '1° primaria',
        //     'nivel_id' => $nivelprimaria->id,
        // ]);
        // $primaria2 = Grado::create([
        //     'grado' => '2° primaria',
        //     'nivel_id' => $nivelprimaria->id,
        // ]);

        // $primaria3 = Grado::create([
        //     'grado' => '3° primaria',
        //     'nivel_id' => $nivelprimaria->id,
        // ]);
        // $primaria4 = Grado::create([
        //     'grado' => '4° primaria',
        //     'nivel_id' => $nivelprimaria->id,
        // ]);
        // $primaria5 = Grado::create([
        //     'grado' => '5° primaria',
        //     'nivel_id' => $nivelprimaria->id,
        // ]);

        // $primaria6 = Grado::create([
        //     'grado' => '6° primaria',
        //     'nivel_id' => $nivelprimaria->id,
        // ]);




        // $secundaria1 = Grado::create([
        //     'grado' => '1° secundaria',
        //     'nivel_id' => $nivelsecundaria->id,
        // ]);

        // $secundaria2 = Grado::create([
        //     'grado' => '2° secundaria',
        //     'nivel_id' => $nivelsecundaria->id,
        // ]);
        // $secundaria3 = Grado::create([
        //     'grado' => '3° secundaria',
        //     'nivel_id' => $nivelsecundaria->id,
        // ]);

        // $secundaria4 = Grado::create([
        //     'grado' => '4° secundaria',
        //     'nivel_id' => $nivelsecundaria->id,
        // ]);

        // $secundaria5 = Grado::create([
        //     'grado' => '5° secundaria',
        //     'nivel_id' => $nivelsecundaria->id,
        // ]);

        // $secundaria6 = Grado::create([
        //     'grado' => '6° secundaria',
        //     'nivel_id' => $nivelsecundaria->id,
        // ]);


        // $usuariopf = User::create([
        //     'nombre' => 'Juan',
        //     'apellidoPaterno' => 'Peres',
        //     'apellidoMaterno' => 'Antelo',
        //     'ci' => '8093809',
        //     'fechaNacimiento' => Carbon::parse('1984-04-01'),
        //     'telefono' => '67718151',
        //     'sexo' => 'M',
        //     'email' => 'juanpa@gmail.com',
        //     'password' => bcrypt('8093809'),
        //     'type' => 'PPff.',
        // ])->assignRole('Padre de Familia');

        // $padre = PadreDeFamilia::create([
        //     'id' => $usuariopf->id,
        //     'ocupacionLaboral' => 'Comerciante',
        //     'mayorGradoInstruccion' => 'Educación secundaria completa',
        //     'tipo' => 'PF',
        //     'estado' => '1',
        // ]);




        // $usuarioprof = User::create([
        //     'nombre' => 'Mario',
        //     'apellidoPaterno' => 'Mamami',
        //     'apellidoMaterno' => 'Quispe',
        //     'ci' => '8112694',
        //     'fechaNacimiento' => Carbon::parse('1980-02-01'),
        //     'telefono' => '70011062',
        //     'sexo' => 'M',
        //     'email' => 'mario@gmail.com',
        //     'password' => bcrypt('8112694'),
        //     'type' => 'prof.',
        // ])->assignRole('Docente');

        // $docente1 = Docente::create([
        //     'id' => $usuarioprof->id,
        //     'especialidad' => 'Matematica',
        //     'nivelFormacion' => 'Maestro de educacion Primaria',
        // ]);

        // $primero_a=Paralelo::create([
        //     'nombre' => '1° Primaria - A',
        //     'cupo' => '40',
        //     'grado_id' => $primaria1->id,
        //     'docente_id' => $docente1->id,
        // ]);

        // $usuarioest = User::create([
        //     'nombre' => 'Juanito',
        //     'apellidoPaterno' => 'Peres',
        //     'apellidoMaterno' => 'Mollo',
        //     'ci' => '8093802',
        //     'fechaNacimiento' => Carbon::parse('2018-07-01'),
        //     'telefono' => '74125632',
        //     'sexo' => 'M',
        //     'email' => 'juanito@gmail.com', 
        //     'password' => bcrypt('8093802'),
        //     'type' => 'Est.',
        // ])->assignRole('Estudiante');

        // Estudiante::create([
        //     'id' => $usuarioest->id,
        //     'nro_rude' => '2024158932',
        //     'nivel_id' => $nivelprimaria->id,
        //     'paralelo_id' => $primero_a->id,            
        // ]);


        // $usuarioest2 = User::create([
        //     'nombre' => 'Luis',
        //     'apellidoPaterno' => 'Peres',
        //     'apellidoMaterno' => 'Mollo',
        //     'ci' => '8052694',
        //     'fechaNacimiento' => Carbon::parse('2016-07-01'),
        //     'telefono' => '70025632',
        //     'sexo' => 'M',
        //     'email' => 'luis@gmail.com',
        //     'password' => bcrypt('8052694'),
        //     'type' => 'Est.',
        // ])->assignRole('Estudiante');

        // Estudiante::create([
        //     'id' => $usuarioest2->id,
        //     'nro_rude' => '2004158932',
        //     'nivel_id' => $nivelprimaria->id,
        //     'paralelo_id' => $primero_a->id,            
        // ]);


        // $dia = Dia::create([
        //     'nombre' => 'Lunes',
        // ]);

        // $periodo = Periodo::create([
        //     'nombre' => 'primer periodo',
        // ]);

        // $intervalo = Intervalo::create([
        //     'horaInicio' => '07:30:00',
        //     'horaFin'=>'08:10:00'
        // ]); 

        // $materia1 = Materia::create([
        //     'name' => 'Matermatica',             
        // ]); 

        // $materia2 = Materia::create([
        //     'name' => 'Lenguaje',             
        // ]);

        // $asignacion1 = AsignacionMateria::create([
        //     'docente_id'=>$docente1->id,
        //     'materia_id' => $materia1->id,

        // ]);

        // $asignacion2 = AsignacionMateria::create([
        //     'docente_id'=>$docente1->id,
        //     'materia_id' => $materia2->id,

        // ]);


    }
}
