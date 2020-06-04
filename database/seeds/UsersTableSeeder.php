<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Admin',
                'lastname' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@teste.com',
                'password' => bcrypt('123456789'),
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2020-05-26 01:32:22',
                'updated_at' => '2020-05-26 01:32:22',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Suporte',
                'lastname' => 'Suporte',
                'username' => 'suporte',
                'email' => 'suporte@teste.com',
                'password' => bcrypt('123456789'),
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2020-05-26 01:32:22',
                'updated_at' => '2020-05-26 01:32:22',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Usuário',
                'lastname' => 'Usuário',
                'username' => 'usuario',
                'email' => 'usuario@teste.com',
                'password' => bcrypt('123456789'),
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2020-05-26 01:32:23',
                'updated_at' => '2020-05-26 01:32:23',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Gestor',
                'lastname' => 'Gestor',
                'username' => 'gestor',
                'email' => 'gestor@teste.com',
                'password' => bcrypt('123456789'),
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2020-05-26 01:32:23',
                'updated_at' => '2020-05-26 01:32:23',
            ),
        ));
    }
}
