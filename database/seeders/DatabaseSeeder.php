<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Carrera;
use App\Models\Facultad;
use Illuminate\Database\Seeder;
use  \App\Models\User;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    


    public function run(): void
    {

        $this->call(RoleSeeder::class);
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'tipoUsuario' => 'Administrador',
            'password' => bcrypt('12345678')
        ])->assignRole('Administrador');


        User::create([
            'name' => 'Estudiante',
            'email' => 'estudiante@example.com',
            'tipoUsuario' => 'Estudiante',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');


        User::create([
            'name' => 'Docente',
            'email' => 'docente@example.com',
            'tipoUsuario' => 'Docente',
            'password' => bcrypt('12345678')
        ])->assignRole('Docente');


        User::create([
            'name' => 'Invitado',
            'email' => 'invitado@example.com',
            'tipoUsuario' => 'Invitado',
            'password' => bcrypt('12345678')
        ])->assignRole('Invitado');

        Facultad::create([
            'nombre' => 'FIMES'
        ]);
        Facultad::create([
            'nombre' => 'OTRO'
        ]);
        

        Carrera::create([
            'nombre' => 'Sistemas',
            'facultad_id' => 1
        ]);

        Carrera::create([
            'nombre' => 'Civil',
            'facultad_id' => 1
        ]);
        Carrera::create([
            'nombre' => 'Economia',
            'facultad_id' => 2
        ]);
        Carrera::create([
            'nombre' => 'Medicina',
            'facultad_id' => 2
        ]);
        Carrera::create([
            'nombre' => 'Enfermeria',
            'facultad_id' => 2
        ]);


    }
}
