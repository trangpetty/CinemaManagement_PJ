<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'email' => 'trangpetty22072001@gmail.com',
                'password' => '0000',
                'role' => 1
            ],
            [
                'username' => 'nv01',
                'email' => 'trang200164@huce.edu.vn',
                'password' => '0000',
                'role' => 0
            ]
        ]);
    }
}
