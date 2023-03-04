<?php

namespace Database\Seeders;

use App\Models\FormSkills;
use Illuminate\Database\Seeder;

class FormSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormSkills::create([
            'form_id' => 1,
            'skill_id' => 3,
        ]);
        FormSkills::create([
            'form_id' => 1,
            'skill_id' => 23,
        ]);
        FormSkills::create([
            'form_id' => 1,
            'skill_id' => 14,
        ]);
        FormSkills::create([
            'form_id' => 1,
            'skill_id' => 4,
        ]);
        FormSkills::create([
            'form_id' => 2,
            'skill_id' => 6,
        ]);
        FormSkills::create([
            'form_id' => 2,
            'skill_id' => 12,
        ]);
        FormSkills::create([
            'form_id' => 2,
            'skill_id' => 24,
        ]);
        FormSkills::create([
            'form_id' => 2,
            'skill_id' => 4,
        ]);
    }
}
