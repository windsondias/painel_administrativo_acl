<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('easydesk_statues')->insert([
            'name' => 'Ativo',
            'priority' =>  1,
            'status' =>  1,
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
        DB::table('easydesk_statues')->insert([
            'name' => 'Resolvido',
            'priority' =>  9999,
            'status' =>  1,
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
    }
}
