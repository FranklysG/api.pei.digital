<?php

namespace Database\Seeders;

use App\Models\Specialist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialist::factory(3)->create([
            'workspace_id' => 1
        ]);
        Specialist::factory(2)->create([
            'workspace_id' => 2
        ]);
    }
}
