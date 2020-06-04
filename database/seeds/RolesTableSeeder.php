<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrador do Sistema',
                'guard_name' => 'web',
                'created_at' => '2020-05-26 01:32:19',
                'updated_at' => '2020-05-26 01:32:19',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Suporte de T.I',
                'guard_name' => 'web',
                'created_at' => '2020-05-26 01:32:20',
                'updated_at' => '2020-05-26 01:32:20',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Gestor de T.I',
                'guard_name' => 'web',
                'created_at' => '2020-05-26 01:32:20',
                'updated_at' => '2020-05-26 01:32:20',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Usuário',
                'guard_name' => 'web',
                'created_at' => '2020-05-26 01:32:21',
                'updated_at' => '2020-05-26 01:32:21',
            ),
        ));
        
        
    }
}