<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'users_view',
            'guard_name' =>  'web',
            'name_view' =>  'Visualizar Usuarios',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'users_create',
            'guard_name' =>  'web',
            'name_view' =>  'Cadastrar Usuarios',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'users_edit',
            'guard_name' =>  'web',
            'name_view' =>  'Editar Usuarios',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'users_destroy',
            'guard_name' =>  'web',
            'name_view' =>  'Deletar Usuarios',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'roles_view',
            'guard_name' =>  'web',
            'name_view' =>  'Visualizar Funções',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'roles_create',
            'guard_name' =>  'web',
            'name_view' =>  'Cadastrar Funções',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'roles_edit',
            'guard_name' =>  'web',
            'name_view' =>  'Editar Funções',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'roles_destroy',
            'guard_name' =>  'web',
            'name_view' =>  'Deletar Funções',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'permissions_view',
            'guard_name' =>  'web',
            'name_view' =>  'Visualizar Permissões',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'permissions_create',
            'guard_name' =>  'web',
            'name_view' =>  'Cadastrar Permissões',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'permissions_edit',
            'guard_name' =>  'web',
            'name_view' =>  'Editar Permissões',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'permissions_destroy',
            'guard_name' =>  'web',
            'name_view' =>  'Deletar Permissões',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'settings_view',
            'guard_name' =>  'web',
            'name_view' =>  'Visualizar Configurações',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
    }
}
