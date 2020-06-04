<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users_view',
                'guard_name' => 'web',
                'name_view' => 'Visualizar Usuarios',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:13',
                'updated_at' => '2020-05-26 01:32:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'users_create',
                'guard_name' => 'web',
                'name_view' => 'Cadastrar Usuarios',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:13',
                'updated_at' => '2020-05-26 01:32:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'users_edit',
                'guard_name' => 'web',
                'name_view' => 'Editar Usuarios',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:14',
                'updated_at' => '2020-05-26 01:32:14',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'users_destroy',
                'guard_name' => 'web',
                'name_view' => 'Deletar Usuarios',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:14',
                'updated_at' => '2020-05-26 01:32:14',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'roles_view',
                'guard_name' => 'web',
                'name_view' => 'Visualizar Funções',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:15',
                'updated_at' => '2020-05-26 01:32:15',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'roles_create',
                'guard_name' => 'web',
                'name_view' => 'Cadastrar Funções',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:15',
                'updated_at' => '2020-05-26 01:32:15',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'roles_edit',
                'guard_name' => 'web',
                'name_view' => 'Editar Funções',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:16',
                'updated_at' => '2020-05-26 01:32:16',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'roles_destroy',
                'guard_name' => 'web',
                'name_view' => 'Deletar Funções',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:16',
                'updated_at' => '2020-05-26 01:32:16',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'permissions_view',
                'guard_name' => 'web',
                'name_view' => 'Visualizar Permissões',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:17',
                'updated_at' => '2020-05-26 01:32:17',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'permissions_create',
                'guard_name' => 'web',
                'name_view' => 'Cadastrar Permissões',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:17',
                'updated_at' => '2020-05-26 01:32:17',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'permissions_edit',
                'guard_name' => 'web',
                'name_view' => 'Editar Permissões',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:18',
                'updated_at' => '2020-05-26 01:32:18',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'permissions_destroy',
                'guard_name' => 'web',
                'name_view' => 'Deletar Permissões',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:18',
                'updated_at' => '2020-05-26 01:32:18',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'settings_view',
                'guard_name' => 'web',
                'name_view' => 'Visualizar Configurações',
                'menu' => 'settings',
                'created_at' => '2020-05-26 01:32:19',
                'updated_at' => '2020-05-26 01:32:19',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'easydesk_view',
                'guard_name' => 'web',
                'name_view' => 'Telas - Visualizar EasyDesk',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 13:14:51',
                'updated_at' => '2020-05-28 01:18:56',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'easydesk_dashboard_view',
                'guard_name' => 'web',
                'name_view' => 'Telas - Visualizar Dashboard',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 13:16:07',
                'updated_at' => '2020-05-28 01:19:39',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'easydesk_tickets_view',
                'guard_name' => 'web',
                'name_view' => 'Telas - Visualizar Chamados',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 13:16:37',
                'updated_at' => '2020-05-28 01:19:21',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'easydesk_teams_view',
                'guard_name' => 'web',
                'name_view' => 'Telas - Visualizar Equipes',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 13:17:07',
                'updated_at' => '2020-05-28 01:19:50',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'easydesk_categories_view',
                'guard_name' => 'web',
                'name_view' => 'Telas - Visualizar Categorias',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 13:17:53',
                'updated_at' => '2020-05-28 01:19:09',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'easydesk_subcategories_view',
                'guard_name' => 'web',
                'name_view' => 'Telas - Visualizar Subcategorias',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 13:18:22',
                'updated_at' => '2020-05-28 01:20:54',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'easydesk_statues_view',
                'guard_name' => 'web',
                'name_view' => 'Telas - Visualizar Status',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 13:18:51',
                'updated_at' => '2020-05-28 01:20:44',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'easydesk_categories_create',
                'guard_name' => 'web',
                'name_view' => 'Categorias - Cadastrar Categorias',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:05:56',
                'updated_at' => '2020-05-28 01:21:15',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'easydesk_subcategories_create',
                'guard_name' => 'web',
                'name_view' => 'Subcategorias - Cadastrar Subcategorias',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:06:19',
                'updated_at' => '2020-05-28 01:22:06',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'easydesk_teams_create',
                'guard_name' => 'web',
                'name_view' => 'Equipes - Cadastrar Equipes',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:06:52',
                'updated_at' => '2020-05-28 01:21:51',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'easydesk_tickets_create',
                'guard_name' => 'web',
                'name_view' => 'Chamados - Cadastrar Chamados',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:07:26',
                'updated_at' => '2020-05-28 01:21:41',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'easydesk_statues_create',
                'guard_name' => 'web',
                'name_view' => 'Status - Cadastrar Status',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:07:54',
                'updated_at' => '2020-05-28 01:21:59',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'easydesk_categories_edit',
                'guard_name' => 'web',
                'name_view' => 'Categorias - Editar Categorias',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:19:17',
                'updated_at' => '2020-05-28 01:22:13',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'easydesk_statues_edit',
                'guard_name' => 'web',
                'name_view' => 'Status - Editar Status',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:19:46',
                'updated_at' => '2020-05-28 01:22:36',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'easydesk_subcategories_edit',
                'guard_name' => 'web',
                'name_view' => 'Subcategorias - Editar Subcategorias',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:19:47',
                'updated_at' => '2020-05-28 01:22:43',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'easydesk_teams_edit',
                'guard_name' => 'web',
                'name_view' => 'Equipes - Editar Equipes',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:23:15',
                'updated_at' => '2020-05-28 01:22:28',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'easydesk_tickets_edit',
                'guard_name' => 'web',
                'name_view' => 'Chamados - Editar Chamados',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:23:42',
                'updated_at' => '2020-05-28 01:22:20',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'easydesk_categories_destroy',
                'guard_name' => 'web',
                'name_view' => 'Categorias - Deletar Categorias',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:34:57',
                'updated_at' => '2020-05-28 01:22:51',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'easydesk_statues_destroy',
                'guard_name' => 'web',
                'name_view' => 'Status - Deletar Status',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:35:24',
                'updated_at' => '2020-05-28 01:23:10',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'easydesk_subcategories_destroy',
                'guard_name' => 'web',
                'name_view' => 'Subcategorias - Deletar Subcategorias',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:35:48',
                'updated_at' => '2020-05-28 01:23:16',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'easydesk_teams_destroy',
                'guard_name' => 'web',
                'name_view' => 'Equipes - Deletar Equipes',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:36:07',
                'updated_at' => '2020-05-28 01:23:03',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'easydesk_tickets_destroy',
                'guard_name' => 'web',
                'name_view' => 'Chamados - Deletar Chamados',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:36:23',
                'updated_at' => '2020-05-28 01:22:57',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'easydesk_teams_view_relations',
                'guard_name' => 'web',
                'name_view' => 'Chamados - Visualizar Apenas Equipes Vinculadas',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:44:27',
                'updated_at' => '2020-05-28 01:20:28',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'easydesk_tickets_view_relations',
                'guard_name' => 'web',
                'name_view' => 'Chamados - Ver  Apenas Chamados Próprios',
                'menu' => 'easydesk',
                'created_at' => '2020-05-27 17:46:15',
                'updated_at' => '2020-05-28 01:18:38',
            ),
        ));
        
        
    }
}