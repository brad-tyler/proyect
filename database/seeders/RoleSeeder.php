<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Para crear nuevos roles y permisos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdministrador = Role::create(['name' => 'Administrador']);
        $roleDocente = Role::create(['name' => 'Docente']);
        $roleEstudiante = Role::create(['name' => 'Estudiante']);
        $roleInvitado = Role::create(['name' => 'Invitado']);

        /**
         * DASHBOARD
         */
        Permission::create(['name' => 'dashboard_title'])->syncRoles([$roleAdministrador, $roleInvitado, $roleDocente, $roleEstudiante]);
        Permission::create(['name' => 'inicio'])->syncRoles([$roleAdministrador, $roleInvitado, $roleDocente, $roleEstudiante]);

        /**
         * ADMINISTRADOR
         */
        Permission::create(['name' => 'administrador_title'])->syncRoles([$roleAdministrador, $roleInvitado]);
        Permission::create(['name' => 'facultad'])->syncRoles([$roleAdministrador, $roleInvitado]);
        Permission::create(['name' => 'matricular_estudiante'])->syncRoles([$roleAdministrador, $roleInvitado]);
        Permission::create(['name' => 'asignar_docente'])->syncRoles([$roleAdministrador, $roleInvitado]);

        /**
         * DOCENTE
         */
        Permission::create(['name' => 'docente_title'])->syncRoles([$roleDocente]);
        Permission::create(['name' => 'curso_docente'])->syncRoles([$roleDocente]);
        Permission::create(['name' => 'lista_tareas'])->syncRoles([$roleDocente]);
        Permission::create(['name' => 'ver_tareas'])->syncRoles([$roleDocente]);

        /**
         * ESTUDIANTE
         */
        Permission::create(['name' => 'estudiante_title'])->syncRoles([$roleEstudiante]);
        Permission::create(['name' => 'tareas_estudiante'])->syncRoles([$roleEstudiante]);
        Permission::create(['name' => 'cursos_estudiante'])->syncRoles([$roleEstudiante]);
    }
}
