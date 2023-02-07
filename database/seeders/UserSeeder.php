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
            'name' => 'Pei admin',
            'email' => 'admin@pei.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Pei User',
            'email' => 'user@pei.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Pei User One',
            'email' => 'userone@pei.com',
            'password' => Hash::make('password')
        ]);
    }
}
