<?php

use Illuminate\Database\Seeder;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facultad')->insert([
            'nombre'=>'Facultad de Ciencias de la Ingenieria',
            'decano'=>'Camilo Solis',
            'estado'=>'ACTIVO',
        ]);

        DB::table('facultad')->insert([
            'nombre'=>'Facultad de Medicina',
            'decano'=>'Moises Alcayaga',
            'estado'=>'ACTIVO',
        ]);

        DB::table('facultad')->insert([
            'nombre'=>'Facultad de Ciencias Basicas',
            'decano'=>'Miguel Gutierrez',
            'estado'=>'ACTIVO',
        ]);

        DB::table('facultad')->insert([
            'nombre'=>'Facultad de Ciencias Sociales y Economicas',
            'decano'=>'Alfredo Perez',
            'estado'=>'ACTIVO',
        ]);

        DB::table('facultad')->insert([
            'nombre'=>'Facultad de Ciencias de la Educacion',
            'decano'=>'Cecilia Nova',
            'estado'=>'ACTIVO',
        ]);


        


    }
}
