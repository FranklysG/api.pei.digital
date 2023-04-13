<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialty::factory(3)->create([
            'form_id' => 1
        ]);
        Specialty::factory(2)->create([
            'form_id' => 3
        ]);
        Specialty::factory(2)->create([
            'form_id' => 2
        ]);
    }
}
