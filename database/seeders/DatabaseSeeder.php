<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(WorkspaceSeeder::class);
        $this->call(UserWorkspaceSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SpecialistSeeder::class);
        $this->call(FormSeeder::class);
        $this->call(SkillSeeder::class);
    }
}
