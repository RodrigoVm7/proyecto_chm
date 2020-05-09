<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            'id_r' => '1',
            'role_id' => '1',
            'user_email' => 'susana@gmail.com',

        ]);

        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_email' => 'mario@gmail.com',

        ]);

        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_email' => 'roberto@gmail.com',

        ]);

        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_email' => 'luis@gmail.com',

        ]);

        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_email' => 'miguel@gmail.com',

        ]);

        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_email' => 'maria@gmail.com',

        ]);

        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_email' => 'barbara@gmail.com',

        ]);

        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_email' => 'valeska@gmail.com',

        ]);

        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_email' => 'beatriz@gmail.com',

        ]);

        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_email' => 'yendelin@gmail.com',

        ]);
    }
}
