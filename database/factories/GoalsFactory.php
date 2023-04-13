<?php

namespace Database\Factories;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specialist>
 */
class GoalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = [
            'matematica',
            'linguagens',
            'natureza',
            'humanas',
            'religiao',
            'diaria',
        ];

        $goals = [
            'matematica' => ['Desenvolver habilidade de resolução de problemas'],
            'linguagens' => [
                'Desenvolver a habilidade de ler e escrever com letra cursiva',
                'Participar dos jogos e brincadeiras'
            ],
            'natureza' => ['Adquirir noções fundamentais sobre a higiene e adquirir o habito de cuidar de si.'],
            'humanas' => ['Reconhecer as formas de relevo através de figuras ampliadas'],
            'religiao' => ['Melhorar a participação nas aulas'],
            'diaria' => [
                'Pedir para ir (falar) ao banheiro',
                'Interagir socialmente com os colegas'
            ]
        ];

        $period = [
            'Primeiro Semestre',
            'Segundo Semestre',
            'Até o final do ano',
        ];

        $rand_type = $type[rand(0, 4)];
        return [
            'type' => $rand_type,
            'goal' => $goals[$rand_type][0],
            'period' => $period[rand(0, 2)],
            'perfomance' => '',
            'strategy' => '',
            'resource' => 'Textos diversos, Livros infantis, vídeos, músicas relacionadas ao assunto trabalhado',
        ];
    }
}
