<?php

use Illuminate\Database\Seeder;

class AcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Academico')->insert([
            'rut'=>'19043792',
            'nombre'=>'Diego',
            'apellido'=>'Alvarez',
            'titulo'=>'Ingeniero Civil Civil',
            'grado_academico'=>'Licenciado',
            'departamento'=>'Departamento de Obras Civiles',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'categoria'=>'Titular',
            'horas_contrato'=>'42',
            'tipo_planta'=>'SI',
            'estado'=>'ACTIVO'
        ]);

        DB::table('Academico')->insert([
            'rut'=>'19044928',
            'nombre'=>'Reinaldo',
            'apellido'=>'Figueroa',
            'titulo'=>'Ingeniero Civil Civil',
            'grado_academico'=>'Magister',
            'departamento'=>'Departamento de Obras Civiles',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'categoria'=>'Auxiliar',
            'horas_contrato'=>'30',
            'tipo_planta'=>'NO',
            'estado'=>'ACTIVO'
        ]);

        DB::table('Academico')->insert([
            'rut'=>'19215697',
            'nombre'=>'Margarita',
            'apellido'=>'Hernandez',
            'titulo'=>'Ingeniero Civil en Electronica',
            'grado_academico'=>'Licenciado',
            'departamento'=>'Departamento de Computacion e Industrias',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'categoria'=>'Instructor',
            'horas_contrato'=>'20',
            'tipo_planta'=>'SI',
            'estado'=>'ACTIVO'
        ]);

        DB::table('Academico')->insert([
            'rut'=>'19255625',
            'nombre'=>'Miriam',
            'apellido'=>'Castro',
            'titulo'=>'Ingeniero Civil en Construccion',
            'grado_academico'=>'Licenciado',
            'departamento'=>'Departamento de Obras Civiles',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'categoria'=>'Adjunto',
            'horas_contrato'=>'25',
            'tipo_planta'=>'NO',
            'estado'=>'ACTIVO'
        ]);

        DB::table('Academico')->insert([
            'rut'=>'19275421',
            'nombre'=>'Ricardo',
            'apellido'=>'Martinez',
            'titulo'=>'Ingeniero Civil Industrial',
            'grado_academico'=>'Magister',
            'departamento'=>'Departamento de Computacion e Industrias',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'categoria'=>'Titular',
            'horas_contrato'=>'42',
            'tipo_planta'=>'SI',
            'estado'=>'ACTIVO'
        ]);

        DB::table('Academico')->insert([
            'rut'=>'19347258',
            'nombre'=>'Camilo',
            'apellido'=>'Solis',
            'titulo'=>'Ingeniero Civil Industrial',
            'grado_academico'=>'Doctor',
            'departamento'=>'Departamento de Computacion e Industrias',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'categoria'=>'Titular',
            'horas_contrato'=>'42',
            'tipo_planta'=>'SI',
            'estado'=>'ACTIVO'
        ]);





        
    }
}
