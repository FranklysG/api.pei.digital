<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'João Antunes',
            'email' => 'admin@pei.com',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Cleber Verde',
            'email' => 'user@pei.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Marcela Vergara',
            'email' => 'userone@pei.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Vivi Teixeira',
            'email' => 'usertwo@pei.com',
            'password' => Hash::make('password')
        ]);
    }
}
