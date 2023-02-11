<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Workspace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'user_id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'contact_movel' => true,
            'contact_email' => false
        ]);
    }
}
