<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
   
    public function run()
    {
    /**
     * Administradores
     *
     * 
     */

        DB::table('users')->insert([
            'email' => 'susana@gmail.com',
            'permiso' => 'Admin',
            'facultad' =>'Facultad de Ciencias de la Educacion',
            'rut' => '19255625',
            'password' => '$2y$10$Y/Y0f7KTk0tMWRnOaNn1BOgyukkJ5RJRP8wpWaGFUL4Dw5za.Ot62',
            'nombre' => 'Susana',
            'apellidos' => 'Perez',
            'estado' => 'ACTIVO',
            
        ]);

        DB::table('users')->insert([
            'email' => 'mario@gmail.com',
            'permiso' => 'Admin',
            'facultad' =>'Facultad de Ciencias de la Ingenieria',
            'rut' => '17878649',
            'password' => '$2y$10$Y/Y0f7KTk0tMWRnOaNn1BOgyukkJ5RJRP8wpWaGFUL4Dw5za.Ot62',
            'nombre' => 'mario',
            'apellidos' => 'salas',
            'estado' => 'ACTIVO',
            
        ]);

        DB::table('users')->insert([
            'email' => 'roberto@gmail.com',
            'permiso' => 'Admin',
            'facultad' =>'Facultad de Medicina',
            'rut' => '17883642',
            'password' => '$2y$10$Y/Y0f7KTk0tMWRnOaNn1BOgyukkJ5RJRP8wpWaGFUL4Dw5za.Ot62',
            'nombre' => 'roberto',
            'apellidos' => 'rodriguez',
            'estado' => 'ACTIVO',
            
        ]);

        DB::table('users')->insert([
            'email' => 'luis@gmail.com',
            'permiso' => 'Admin',
            'facultad' =>'Facultad de Ciencias Basicas',
            'rut' => '18331313',
            'password' => '$2y$10$Y/Y0f7KTk0tMWRnOaNn1BOgyukkJ5RJRP8wpWaGFUL4Dw5za.Ot62',
            'nombre' => 'luis',
            'apellidos' => 'parra',
            'estado' => 'ACTIVO',
            
        ]);

        DB::table('users')->insert([
            'email' => 'miguel@gmail.com',
            'permiso' => 'Admin',
            'facultad' =>'Facultad de Ciencias Sociales y Economicas',
            'rut' => '18476544',
            'password' => '$2y$10$Y/Y0f7KTk0tMWRnOaNn1BOgyukkJ5RJRP8wpWaGFUL4Dw5za.Ot62',
            'nombre' => 'miguel',
            'apellidos' => 'torres',
            'estado' => 'ACTIVO',
            
        ]);

    /**
     * Secretarios
     *
     * 
     */

        DB::table('users')->insert([
            'email' => 'maria@gmail.com',
            'permiso' => 'Secretario',
            'facultad' =>'Facultad de Ciencias de la Educacion',
            'rut' => '18981525',
            'password' => '$2y$10$IuGtC2Dye0.CbSUgc7S1Z.otjWKhst6WRS8O8MaL1E9.3I8fbGiZy',
            'nombre' => 'maria',
            'apellidos' => 'medel',
            'estado' => 'ACTIVO',
            
        ]);

        DB::table('users')->insert([
            'email' => 'barbara@gmail.com',
            'permiso' => 'Secretario',
            'facultad' =>'Facultad de Ciencias de la Ingenieria',
            'rut' => '18982909',
            'password' => '$2y$10$IuGtC2Dye0.CbSUgc7S1Z.otjWKhst6WRS8O8MaL1E9.3I8fbGiZy',
            'nombre' => 'barbara',
            'apellidos' => 'medina',
            'estado' => 'ACTIVO',
            
        ]);

        DB::table('users')->insert([
            'email' => 'valeska@gmail.com',
            'permiso' => 'Secretario',
            'facultad' =>'Facultad de Medicina',
            'rut' => '19008693',
            'password' => '$2y$10$IuGtC2Dye0.CbSUgc7S1Z.otjWKhst6WRS8O8MaL1E9.3I8fbGiZy',
            'nombre' => 'valeska',
            'apellidos' => 'opazo',
            'estado' => 'ACTIVO',

        ]);

        DB::table('users')->insert([
            'email' => 'beatriz@gmail.com',
            'permiso' => 'Secretario',
            'facultad' =>'Facultad de Ciencias Basicas',
            'rut' => '19008752',
            'password' => '$2y$10$IuGtC2Dye0.CbSUgc7S1Z.otjWKhst6WRS8O8MaL1E9.3I8fbGiZy',
            'nombre' => 'beatriz',
            'apellidos' => 'moraga',
            'estado' => 'ACTIVO',
            
        ]);

        DB::table('users')->insert([
            'email' => 'yendelin@gmail.com',
            'permiso' => 'Secretario',
            'facultad' =>'Facultad de Ciencias Sociales y Economicas',
            'rut' => '19039481',
            'password' => '$2y$10$IuGtC2Dye0.CbSUgc7S1Z.otjWKhst6WRS8O8MaL1E9.3I8fbGiZy',
            'nombre' => 'yendelin',
            'apellidos' => 'ortega',
            'estado' => 'ACTIVO',
            
        ]);




       


    }
}
