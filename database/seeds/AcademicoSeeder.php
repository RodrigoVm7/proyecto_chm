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

        // DECANOS ************************************

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

        DB::table('Academico')->insert([
            'rut'=>'19386399',
            'nombre'=>'Moises',
            'apellido'=>'Alcayaga',
            'titulo'=>'Ingeniero Civil Industrial',
            'grado_academico'=>'Doctorado en Ciencias Medicas',
            'departamento'=>'Departamento de Ciencias Clinicas',
            'facultad'=>'Facultad de Ciencias de la Ingenieria',
            'categoria'=>'Titular',
            'horas_contrato'=>'42',
            'tipo_planta'=>'SI',
            'estado'=>'ACTIVO'
        ]);

        DB::table('Academico')->insert([
            'rut'=>'19387647',
            'nombre'=>'Miguel',
            'apellido'=>'Gutierrez',
            'titulo'=>'Profesor de Ciencias',
            'grado_academico'=>'Doctorado en Ciencias Matematicas',
            'departamento'=>'Departamento de Ciencias',
            'facultad'=>'Facultad de Ciencias Basicas',
            'categoria'=>'Titular',
            'horas_contrato'=>'42',
            'tipo_planta'=>'SI',
            'estado'=>'ACTIVO'
        ]);

        DB::table('Academico')->insert([
            'rut'=>'19388144',
            'nombre'=>'Alfredo',
            'apellido'=>'Perez',
            'titulo'=>'Profesor de Ciencias',
            'grado_academico'=>'Doctorado en Ciencias Sociales',
            'departamento'=>'Departamento de Economia y Administracion',
            'facultad'=>'Facultad de Ciencias Sociales y Economicas',
            'categoria'=>'Titular',
            'horas_contrato'=>'42',
            'tipo_planta'=>'SI',
            'estado'=>'ACTIVO'
        ]);

        DB::table('Academico')->insert([
            'rut'=>'19389013',
            'nombre'=>'Cecilia',
            'apellido'=>'Nova',
            'titulo'=>'Profesor de Ciencias',
            'grado_academico'=>'Doctorado en Ciencias Matematicas',
            'departamento'=>'Departamento de Formacion Inicial Escolar',
            'facultad'=>'Facultad de Ciencias de la Educacion',
            'categoria'=>'Titular',
            'horas_contrato'=>'42',
            'tipo_planta'=>'SI',
            'estado'=>'ACTIVO'
        ]);
//************************************************** */

        





        
    }
}
