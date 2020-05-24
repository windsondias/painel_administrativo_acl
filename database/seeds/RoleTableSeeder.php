<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrador do Sistema',
            'guard_name' =>  'web',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('roles')->insert([
            'name' => 'Suporte de T.I',
            'guard_name' =>  'web',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('roles')->insert([
            'name' => 'Gestor de T.I',
            'guard_name' =>  'web',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('roles')->insert([
            'name' => 'Usuário',
            'guard_name' =>  'web',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);

    }
}
