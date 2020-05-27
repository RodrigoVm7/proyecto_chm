<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FacultadSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(AcademicoSeeder::class);
        $this->call(PeriodoSeeder::class);
        $this->call(ComisionSeeder::class);
        

    }
}
