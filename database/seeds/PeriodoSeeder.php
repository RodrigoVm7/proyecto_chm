<?php

use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodos')->insert([
            'año'=>'2019',
            'estado'=>'INACTIVO',

        ]);

        DB::table('periodos')->insert([
            'año'=>'2020',
            'estado'=>'ACTIVO',

        ]);
    }
}
