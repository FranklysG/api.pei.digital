<?php

namespace Database\Seeders;

use App\Models\Goals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Goals::factory(3)->create([
            'form_id' => 1
        ]);
        Goals::factory(2)->create([
            'form_id' => 3
        ]);
        Goals::factory(2)->create([
            'form_id' => 2
        ]);
    }
}
