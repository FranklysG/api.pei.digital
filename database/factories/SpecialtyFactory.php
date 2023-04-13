<?php

namespace Database\Factories;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specialist>
 */
class SpecialtyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $week = [
            'Segunda',
            'Terça',
            'Quarta',
            'Quinta',
            'Sexta',
        ];

        return [
            'name' => $this->faker->name(),
            'location' => 'APAE',
            'professional' => 'Dr. '.$this->faker->name(),
            'day' => $week[rand(0,4)],
            'hour' => date('H:00'),
            'contact' => '(99) 998457 6434',
        ];
    }
}
