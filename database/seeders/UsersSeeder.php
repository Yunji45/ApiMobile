<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin' . '@laravel.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',            
        ],
        [
            'id' => 2,
            'name' => 'kurir',
            'email' => 'kurir@gmail.com',
            'password' => bcrypt('kurir'),
            'role' => 'kurir'
        ]
    );

    }
}
