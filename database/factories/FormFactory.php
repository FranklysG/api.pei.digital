<?php
/*
 *  ______     __  __     ______     ______     __   __   ______     __
 * /\  == \   /\ \/\ \   /\___  \   /\___  \   /\ \ / /  /\  ___\   /\ \
 * \ \  __<   \ \ \_\ \  \/_/  /__  \/_/  /__  \ \ \'/   \ \  __\   \ \ \____
 *  \ \_____\  \ \_____\   /\_____\   /\_____\  \ \__|    \ \_____\  \ \_____\
 *   \/_____/   \/_____/   \/_____/   \/_____/   \/_/      \/_____/   \/_____/
 *
 * Made By: Franklys Guimarães
 *
 * ♥ BY Buzzers: BUZZVEL.COM
 * Last Update: 2022.9.09
 */

namespace Database\Factories;

use App\Models\Specialist;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Form>
 */
class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'Plano de Estudo - '.$this->faker->name(),
            'name' => $this->faker->name(),
            'year' => $this->faker->randomNumber(1).'°',
            'class' => 'B°',
            'bout' => 'Matutino',
            'birthdate' => $this->faker->date('d/m/Y'),
            'father' => $this->faker->firstNameMale().' '.$this->faker->lastName(),
            'mother' => $this->faker->firstNameFemale().' '.$this->faker->lastName(),
            'diagnostic' => 'CID 10 F 84.0 (Autismo Infantil)',
            'description' => $this->faker->realText('2000'),
            'type' => 'success',
            'status' => 'Aprovado',
            'date' => date('M d, Y')
        ];
    }
}
