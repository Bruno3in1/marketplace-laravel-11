<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Bruno Ribeiro',
                'username' => '3in1',
                'email' => 'bruno@3in1.com.br',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Vendedor vendor',
                'username' => 'vendor',
                'email' => 'vendedor@3in1.com.br',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Clliente user',
                'username' => 'user',
                'email' => 'cliente@3in1.com.br',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
