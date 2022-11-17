<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'username' => 'user',
                'password' => bcrypt('12345'),
                'role' => 2,
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => bcrypt('12345'),
                'role' => 1,
            ],
            
        ];
        DB::table('users')->insert($data);
    }
}
