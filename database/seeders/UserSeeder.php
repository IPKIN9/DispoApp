<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            'id' => '539',
            'nama' => 'Admin',
            'email' => 'admin@dispo.com',
            'role' => 'crud-list',
            'password' => Hash::make('123456')
        ]);
    }
}
