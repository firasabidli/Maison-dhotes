<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'propriétaire',
            'email' => 'proprietaire@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'propriétaire'
        ]);

        User::create([
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'client'
        ]);
    }
}
