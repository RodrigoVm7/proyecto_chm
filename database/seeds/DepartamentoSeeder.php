<?php

use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    //Facultad de Ingenieria****************************************************************
        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Computacion e Industrias',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'estado'=>'ACTIVO',
        ]);

        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Obras Civiles',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'estado'=>'ACTIVO',
        ]);
        
    //Facultad de Ciencias de la educacion****************************************************************
        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Formacion Inicial Escolar',
            'facultad'=>'Facultad de Ciencias de la Educacion',
            'estado'=>'ACTIVO',
        ]);

        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Lengua Castellana y Literatura',
            'facultad'=>'Facultad de Ciencias de la Educacion',
            'estado'=>'ACTIVO',
        ]);

    //Facultad de Ciencias basicas****************************************************************
        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Ciencias',
            'facultad'=>'Facultad de Ciencias Basicas',
            'estado'=>'ACTIVO',
        ]);

    //Facultad de Ciencias Sociales****************************************************************
        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Ciencias Sociales',
            'facultad'=>'Facultad de Ciencias Sociales y Economicas',
            'estado'=>'ACTIVO',
        ]);

        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Economia y Administracion',
            'facultad'=>'Facultad de Ciencias Sociales y Economicas',
            'estado'=>'ACTIVO',
        ]);

        //Facultad de Medicina****************************************************************    
        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Ciencias Clinicas',
            'facultad'=>'Facultad de Medicina',
            'estado'=>'ACTIVO',
        ]);

        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Ciencias Pre-Clinicas',
            'facultad'=>'Facultad de Medicina',
            'estado'=>'ACTIVO',
        ]);

        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Neurociencia',
            'facultad'=>'Facultad de Medicina',
            'estado'=>'ACTIVO',
        ]);

        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Enfermería',
            'facultad'=>'Facultad de Medicina',
            'estado'=>'ACTIVO',
        ]);

        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Kinesiología',
            'facultad'=>'Facultad de Medicina',
            'estado'=>'ACTIVO',
        ]);

        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Fonoaudiología',
            'facultad'=>'Facultad de Medicina',
            'estado'=>'ACTIVO',
        ]);

        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Oftalmología',
            'facultad'=>'Facultad de Medicina',
            'estado'=>'ACTIVO',
        ]);

        DB::table('departamento')->insert([
            'nombre'=>'Departamento de Terapia Ocupacional y Ciencia de la Ocupación',
            'facultad'=>'Facultad de Medicina',
            'estado'=>'ACTIVO',
        ]);



    }
}
