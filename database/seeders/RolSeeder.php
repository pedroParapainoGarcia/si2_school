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

        Permission::create(['name' => 'admin.home', 'description' => 'Ver dashboard Principal'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.roles', 'description' => 'Ver Lista de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar datos de Un Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$role1]);
    }
}
