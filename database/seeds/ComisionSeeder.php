<?php

use Illuminate\Database\Seeder;

class ComisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comision')->insert([
            'año'=>'2019',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'rut_academico'=>'18982909',
            'decano'=>'Camilo Solis',
            'miembro1'=>'Marcelo Alvarez',
            'miembro2'=>'Ronald Figueroa',
            'fecha_pie'=>'2019-04-26',
            'estado'=>'ACTIVO',

        ]);

        DB::table('comision')->insert([
            'año'=>'2019',
            'facultad'=>'Facultad de Medicina',
            'rut_academico'=>'18982909',
            'decano'=>'Moises Alcayaga',
            'miembro1'=>'Roberto Iglesias',
            'miembro2'=>'Juan Montes',
            'fecha_pie'=>'2019-12-26',
            'estado'=>'ACTIVO',

        ]);

        DB::table('comision')->insert([
            'año'=>'2020',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'rut_academico'=>'18982909',
            'decano'=>'Camilo Solis',
            'miembro1'=>'Samuel Salgado',
            'miembro2'=>'Jorge Barrientos',
            'fecha_pie'=>'2020-05-06',
            'estado'=>'INACTIVO',

        ]);

       

        
    }
}
