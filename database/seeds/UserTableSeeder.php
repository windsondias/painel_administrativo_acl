<?php

use Illuminate\Database\Seeder;
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
            'password' => bcrypt('admin123'),
            'status' =>  '1',
            'created_at' => Carbon::now()->toDateTime(),
            'updated_at' => Carbon::now()->toDateTime(),
        ]);
    }
}
