<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Colegio;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\PadreDeFamilia;
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
            'correo' => 'SAFATSORUCOS@HOTMAIL.COM',
            'telefono' => '3985076',
            'ubicacion' => 'VILLA 1RO. DE MAYO',
        ]);

        $usuarioadm = User::create([
            'nombre' => 'Joaquin',
            'apellidoPaterno' => 'Chumacero',
            'apellidoMaterno' => 'Antelo',
            'ci' => '8093807',
            'fechaNacimiento' => Carbon::parse('1974-08-01'),
            'telefono' => '73980236',
            'sexo' => 'M',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('8093807'),
            'type' => 'Adm.',
        ])->assignRole('Administrador');

        Administrador::create([
            'id' => $usuarioadm->id,
            'cargo' => 'Director',
            'colegio_id' => $colegio->id,
        ]);


        $gestion24 = Gestion::create([
            'nombreGestion' => 'Gestion 2024',
            'fechaHoraCreacion' => Carbon::now()->format('Y-m-d H:i:s'),
            'estado' => true,
        ]);
        $nivelpm = Nivel::create([
            'nivel' => 'Primaria',
            'turno' => 'Mañana',
            'gestion_id' => $gestion24->id,
        ]);

        $nivelpt = Nivel::create([
            'nivel' => 'Primaria',
            'turno' => 'Tarde',
            'gestion_id' => $gestion24->id,
        ]);
        $nivelsm = Nivel::create([
            'nivel' => 'Secundaria',
            'turno' => 'Mañana',
            'gestion_id' => $gestion24->id,
        ]);

        $nivelst = Nivel::create([
            'nivel' => 'Secundaria',
            'turno' => 'Tarde',
            'gestion_id' => $gestion24->id,
        ]);


        $primaria1 = Grado::create([
            'curso' => 'Primaria-1',            
            'nivel_id' => $nivelpm->id,
        ]);
        Grado::create([
            'curso' => 'Primaria-1',            
            'nivel_id' => $nivelpm->id,
        ]);

        Grado::create([
            'curso' => 'Primaria-2',            
            'nivel_id' => $nivelpm->id,
        ]);
        Grado::create([
            'curso' => 'Primaria-2',            
            'nivel_id' => $nivelpm->id,
        ]);
        Grado::create([
            'curso' => 'Primaria-2',            
            'nivel_id' => $nivelpm->id,
        ]);

        $primaria3 = Grado::create([
            'curso' => 'Primaria-3',            
            'nivel_id' => $nivelpm->id,
        ]);

        Grado::create([
            'curso' => 'Primaria-3',            
            'nivel_id' => $nivelpm->id,
        ]);

        Grado::create([
            'curso' => 'Primaria-4',            
            'nivel_id' => $nivelpm->id,
        ]);

        Grado::create([
            'curso' => 'Primaria-4',           
            'nivel_id' => $nivelpm->id,
        ]);
        Grado::create([
            'curso' => 'Primaria-4',            
            'nivel_id' => $nivelpm->id,
        ]);

        Grado::create([
            'curso' => 'Primaria-5',           
            'nivel_id' => $nivelpm->id,
        ]);
        Grado::create([
            'curso' => 'Primaria-5',            
            'nivel_id' => $nivelpm->id,
        ]);

        Grado::create([
            'curso' => 'Primaria-5',           
            'nivel_id' => $nivelpm->id,
        ]);

        Grado::create([
            'curso' => 'Primaria-6',            
            'nivel_id' => $nivelpm->id,
        ]);

        Grado::create([
            'curso' => 'Primaria-6',            
            'nivel_id' => $nivelpm->id,
        ]);
        Grado::create([
            'curso' => 'Primaria-6',            
            'nivel_id' => $nivelpm->id,
        ]);
        Grado::create([
            'curso' => 'Primaria-6',            
            'nivel_id' => $nivelpm->id,
        ]);


        Grado::create([
            'curso' => 'Secundaria-1',           
            'nivel_id' => $nivelsm->id,
        ]);

        Grado::create([
            'curso' => 'Secundaria-2',            
            'nivel_id' => $nivelsm->id,
        ]);
        Grado::create([
            'curso' => 'Secundaria-3',            
            'nivel_id' => $nivelsm->id,
        ]);

        Grado::create([
            'curso' => 'Secundaria-4',            
            'nivel_id' => $nivelsm->id,
        ]);

        Grado::create([
            'curso' => 'Secundaria-5',           
            'nivel_id' => $nivelsm->id,
        ]);

        Grado::create([
            'curso' => 'Secundaria-6',            
            'nivel_id' => $nivelsm->id,
        ]);
        Grado::create([
            'curso' => 'Secundaria-6',            
            'nivel_id' => $nivelsm->id,
        ]);

        $usuariopf = User::create([
            'nombre' => 'Juan',
            'apellidoPaterno' => 'Peres',
            'apellidoMaterno' => 'Antelo',
            'ci' => '8093809',
            'fechaNacimiento' => Carbon::parse('1984-04-01'),
            'telefono' => '67718151',
            'sexo' => 'M',
            'email' => 'juanpa@gmail.com',
            'password' => bcrypt('8093809'),
            'type' => 'PPff.',
        ])->assignRole('Padre de Familia');

        $padre = PadreDeFamilia::create([
            'id' => $usuariopf->id,
            'ocupacionLaboral' => 'Comerciante',
            'mayorGradoInstruccion' => 'Educación secundaria completa',
            'tipo' => 'PF',
            'estado' => '1',
        ]);


        $usuarioest = User::create([
            'nombre' => 'Juanito',
            'apellidoPaterno' => 'Peres',
            'apellidoMaterno' => 'Mollo',
            'ci' => '8093802',
            'fechaNacimiento' => Carbon::parse('2018-07-01'),
            'telefono' => '74125632',
            'sexo' => 'M',
            'email' => 'juanito@gmail.com',
            'password' => bcrypt('8093802'),
            'type' => 'Est.',
        ])->assignRole('Estudiante');

        Estudiante::create([
            'id' => $usuarioest->id,
            'nro_rude' => '2024158932',
            'nivel_id' => $nivelpm->id,
            'grado_id' => $primaria1->id,
            'padre_id' => $usuariopf->id,
        ]);


        $usuarioest2 = User::create([
            'nombre' => 'Luis',
            'apellidoPaterno' => 'Peres',
            'apellidoMaterno' => 'Mollo',
            'ci' => '8052694',
            'fechaNacimiento' => Carbon::parse('2016-07-01'),
            'telefono' => '70025632',
            'sexo' => 'M',
            'email' => 'luis@gmail.com',
            'password' => bcrypt('8052694'),
            'type' => 'Est.',
        ])->assignRole('Estudiante');

        Estudiante::create([
            'id' => $usuarioest2->id,
            'nro_rude' => '2004158932',
            'nivel_id' => $nivelpm->id,
            'grado_id' => $primaria3->id,
            'padre_id' => $usuariopf->id,
        ]);

        $usuarioprof = User::create([
            'nombre' => 'Mario',
            'apellidoPaterno' => 'Mamami',
            'apellidoMaterno' => 'Quispe',
            'ci' => '8112694',
            'fechaNacimiento' => Carbon::parse('1980-02-01'),
            'telefono' => '70011062',
            'sexo' => 'M',
            'email' => 'mario@gmail.com',
            'password' => bcrypt('8112694'),
            'type' => 'prof.',
        ])->assignRole('Docente');

        Docente::create([
            'id' => $usuarioprof->id,
            'especialidad' => 'Matematica',
            'nivelFormacion'=>'Maestro de educacion Primaria',
        ]);
    }
}
