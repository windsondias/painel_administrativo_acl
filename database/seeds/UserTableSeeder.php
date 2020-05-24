<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'lastname' =>  'Admin',
            'username' =>  'admin',
            'email' =>  'admin@teste.com',
            'password' => bcrypt('123456789'),
            'status' =>  '1',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('users')->insert([
            'name' => 'Suporte',
            'lastname' =>  'Suporte',
            'username' =>  'suporte',
            'email' =>  'suporte@teste.com',
            'password' => bcrypt('123456789'),
            'status' =>  '1',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('users')->insert([
            'name' => 'Usuário',
            'lastname' =>  'Usuário',
            'username' =>  'usuario',
            'email' =>  'usuario@teste.com',
            'password' => bcrypt('123456789'),
            'status' =>  '1',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('users')->insert([
            'name' => 'Gestor',
            'lastname' =>  'Gestor',
            'username' =>  'gestor',
            'email' =>  'gestor@teste.com',
            'password' => bcrypt('123456789'),
            'status' =>  '1',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);

    }
}
