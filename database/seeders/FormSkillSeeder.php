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
            'helper' => 'Compreender e realizar as atividades propostas a ele pelo professor, pois as vezes quer impor a sua vontade (Ex. o que fazer no computador)'
        ]);
        FormSkills::create([
            'form_id' => 1,
            'skill_id' => 23,
            'helper' => 'Atividades com uso de tesoura, jogos e atividades físicas para melhorar a coordenação motora.'
        ]);
        FormSkills::create([
            'form_id' => 1,
            'skill_id' => 14,
            'helper' => 'Manter interesse no ambiente escolar'
        ]);
        FormSkills::create([
            'form_id' => 1,
            'skill_id' => 4,
            'helper' => 'Trabalhar em duplas ou grupo'
        ]);
        FormSkills::create([
            'form_id' => 2,
            'skill_id' => 6,
            'helper' => 'Realizar sequência lógica em historinhas, livros, brincadeiras'
        ]);
        FormSkills::create([
            'form_id' => 2,
            'skill_id' => 12,
            'helper' => 'Compreender a lógica dos jogos e atividades coletivas'
        ]);
        FormSkills::create([
            'form_id' => 2,
            'skill_id' => 24,
            'helper' => 'Utilizar mais a colher do que a mão ao se alimentar.'
        ]);
        FormSkills::create([
            'form_id' => 2,
            'skill_id' => 4,
            'helper' => 'Organizar seu material (tirar da mochila, colocar novamente mesmo que com a ajuda de sua cuidadora)'
        ]);
    }
}
