<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Docente']);
        $role3 = Role::create(['name' => 'Padre de Familia']);
        $role4 = Role::create(['name' => 'Estudiante']);

        Permission::create(['name' => 'admin.index', 'description' => 'Ver dashboard Principal'])->syncRoles([$role1, $role2,$role3, $role4]);

        Permission::create(['name' => 'usuarios.index', 'description' => 'Ver Lista Usuarios'])->syncRoles([$role1,$role2]);        
        Permission::create(['name' => 'usuarios.create', 'description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.edit', 'description' => 'Editar datos Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.destroy', 'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'roles.index', 'description' => 'Ver Lista de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar datos de Un Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'colegios.index', 'description' => 'Ver Lista Colegios'])->syncRoles([$role1,$role2]);        
        Permission::create(['name' => 'colegios.create', 'description' => 'Crear Colegios'])->syncRoles([$role1]);
        Permission::create(['name' => 'colegios.edit', 'description' => 'Editar datos Colegios'])->syncRoles([$role1]);
        Permission::create(['name' => 'colegios.destroy', 'description' => 'Eliminar Colegios'])->syncRoles([$role1]);

        Permission::create(['name' => 'gestiones.index', 'description' => 'Ver Lista Gestiones'])->syncRoles([$role1,$role2]);        
        Permission::create(['name' => 'gestiones.create', 'description' => 'Crear Gestiones'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestiones.edit', 'description' => 'Editar datos Gestiones'])->syncRoles([$role1]);
        Permission::create(['name' => 'gestiones.destroy', 'description' => 'Eliminar Gestiones'])->syncRoles([$role1]);

        Permission::create(['name' => 'configuraciones.index', 'description' => 'ver Panel de Config. de la institucion'])->syncRoles([$role1]); 
        
        Permission::create(['name' => 'administradors.index', 'description' => 'Ver Lista de Administradores'])->syncRoles([$role1]);
        Permission::create(['name' => 'administradors.create', 'description' => 'Crea Administradores'])->syncRoles([$role1]);
        Permission::create(['name' => 'administradors.edit', 'description' => 'Editar datos de Administradores'])->syncRoles([$role1]);
        Permission::create(['name' => 'administradors.destroy', 'description' => 'Eliminar Administradores'])->syncRoles([$role1]);

        Permission::create(['name' => 'docentes.index', 'description' => 'Ver Lista Docentes'])->syncRoles([$role1,$role2]);        
        Permission::create(['name' => 'docentes.create', 'description' => 'Crear Docentes'])->syncRoles([$role1]);
        Permission::create(['name' => 'docentes.edit', 'description' => 'Editar datos Docentes'])->syncRoles([$role1]);
        Permission::create(['name' => 'docentes.destroy', 'description' => 'Eliminar Docentes'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'estudiantes.index', 'description' => 'Ver Lista de Estudiante'])->syncRoles([$role1]);
        Permission::create(['name' => 'estudiantes.create', 'description' => 'Crear Estudiante'])->syncRoles([$role1]);
        Permission::create(['name' => 'estudiantes.edit', 'description' => 'Editar datos de Un Estudiante'])->syncRoles([$role1]);
        Permission::create(['name' => 'estudiantes.destroy', 'description' => 'Eliminar Estudiante'])->syncRoles([$role1]);

        Permission::create(['name' => 'inscripciones.index', 'description' => 'Panel de Inscripcion Est.'])->syncRoles([$role1]);

        Permission::create(['name' => 'tutores.index', 'description' => 'Ver Lista Tutores'])->syncRoles([$role1,$role2]);        
        Permission::create(['name' => 'tutores.create', 'description' => 'Crear Tutores'])->syncRoles([$role1]);
        Permission::create(['name' => 'tutores.edit', 'description' => 'Editar datos Tutores'])->syncRoles([$role1]);
        Permission::create(['name' => 'tutores.destroy', 'description' => 'Eliminar Tutores'])->syncRoles([$role1]);

        Permission::create(['name' => 'materias.index', 'description' => 'Ver Lista de Materias'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'materias.create', 'description' => 'Crea Materias'])->syncRoles([$role1]);
        Permission::create(['name' => 'materias.edit', 'description' => 'Editar datos de Materias'])->syncRoles([$role1]);
        Permission::create(['name' => 'materias.destroy', 'description' => 'Eliminar Materias'])->syncRoles([$role1]); 

        Permission::create(['name' => 'asignacionmaterias.index', 'description' => 'Ver Lista de Asig. materias'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'asignacionmaterias.create', 'description' => 'Crea Asig. materias'])->syncRoles([$role1]);
        Permission::create(['name' => 'asignacionmaterias.edit', 'description' => 'Editar datos de Asig. materias'])->syncRoles([$role1]);
        Permission::create(['name' => 'asignacionmaterias.destroy', 'description' => 'Eliminar Asig. materias'])->syncRoles([$role1]);

        Permission::create(['name' => 'niveles.index', 'description' => 'Ver Lista Niveles'])->syncRoles([$role1,$role2]);        
        Permission::create(['name' => 'niveles.create', 'description' => 'Crear Niveles'])->syncRoles([$role1]);
        Permission::create(['name' => 'niveles.edit', 'description' => 'Editar datos Niveles'])->syncRoles([$role1]);
        Permission::create(['name' => 'niveles.destroy', 'description' => 'Eliminar Niveles'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'grados.index', 'description' => 'Ver Lista de Cursos'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'grados.create', 'description' => 'Crear Cursos'])->syncRoles([$role1]);
        Permission::create(['name' => 'grados.edit', 'description' => 'Editar datos de Un Cursos'])->syncRoles([$role1]);
        Permission::create(['name' => 'grados.destroy', 'description' => 'Eliminar Cursos'])->syncRoles([$role1]);

        Permission::create(['name' => 'paralelos.index', 'description' => 'Ver Lista Paralelos'])->syncRoles([$role1,$role2,$role2]);        
        Permission::create(['name' => 'paralelos.create', 'description' => 'Crear Paralelos'])->syncRoles([$role1]);
        Permission::create(['name' => 'paralelos.edit', 'description' => 'Editar datos Paralelos'])->syncRoles([$role1]);
        Permission::create(['name' => 'paralelos.destroy', 'description' => 'Eliminar Paralelos'])->syncRoles([$role1]); 
        Permission::create(['name' => 'paralelos.generatePDF', 'description' => 'Ver Reportes de Paralelos'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'aulas.index', 'description' => 'Ver Lista Aulas'])->syncRoles([$role1,$role2]);        
        Permission::create(['name' => 'aulas.create', 'description' => 'Crear Aulas'])->syncRoles([$role1]);
        Permission::create(['name' => 'aulas.edit', 'description' => 'Editar datos Aulas'])->syncRoles([$role1]);
        Permission::create(['name' => 'aulas.destroy', 'description' => 'Eliminar Aulas'])->syncRoles([$role1]);

        Permission::create(['name' => 'dias.index', 'description' => 'Ver Lista de Dias'])->syncRoles([$role1]);
        Permission::create(['name' => 'dias.create', 'description' => 'Crea Dias'])->syncRoles([$role1]);
        Permission::create(['name' => 'dias.edit', 'description' => 'Editar datos de Dias'])->syncRoles([$role1]);
        Permission::create(['name' => 'dias.destroy', 'description' => 'Eliminar Dias'])->syncRoles([$role1]); 

        Permission::create(['name' => 'intervalos.index', 'description' => 'Ver Lista de Intervalos de horario'])->syncRoles([$role1]);
        Permission::create(['name' => 'intervalos.create', 'description' => 'Crea Intervalos de horario'])->syncRoles([$role1]);
        Permission::create(['name' => 'intervalos.edit', 'description' => 'Editar datos de Intervalos de horario'])->syncRoles([$role1]);
        Permission::create(['name' => 'intervalos.destroy', 'description' => 'Eliminar Intervalos de horario'])->syncRoles([$role1]);

        Permission::create(['name' => 'periodos.index', 'description' => 'Ver Lista Periodos'])->syncRoles([$role1,$role2]);        
        Permission::create(['name' => 'periodos.create', 'description' => 'Crear Periodos'])->syncRoles([$role1]);
        Permission::create(['name' => 'periodos.edit', 'description' => 'Editar datos Periodos'])->syncRoles([$role1]);
        Permission::create(['name' => 'periodos.destroy', 'description' => 'Eliminar Periodos'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'horarios.index', 'description' => 'Ver Lista de Horarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'horarios.create', 'description' => 'Crear Horarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'horarios.edit', 'description' => 'Editar datos de Un Horarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'horarios.destroy', 'description' => 'Eliminar Horarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'tutorestudiantes.index', 'description' => 'Ver Lista Tutor-Estudiante'])->syncRoles([$role1,$role2]);        
        Permission::create(['name' => 'tutorestudiantes.create', 'description' => 'Crear Tutor-Estudiante'])->syncRoles([$role1]);
        Permission::create(['name' => 'tutorestudiantes.edit', 'description' => 'Editar datos Tutor-Estudiante'])->syncRoles([$role1]);
        Permission::create(['name' => 'tutorestudiantes.destroy', 'description' => 'Eliminar Tutor-Estudiante'])->syncRoles([$role1]); 
        
        
    }
}
