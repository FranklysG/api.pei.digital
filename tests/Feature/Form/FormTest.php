<?php

namespace Tests\Feature;

use App\Models\Form;
use App\Models\Specialist;
use App\Models\Specialty;
use Database\Factories\FormFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * @return void
     */

    /** @test */
    public function user_try_create_forms_user()
    {
        $workspace = $this->workspace();
        $specialist = Specialist::factory()->create([
            'workspace_id' => $workspace->id
        ]);
        $data = [
            'title' => 'Plano de estudo 3° B',
            'name' => 'Gustavo Bezerra da Silva',
            'year' => '4°',
            'class' => 'A',
            'bout' => 'Matutino',
            'birthdate' => '10/08/2012',
            'father' => 'Adilson Carlos da Silva',
            'mother' => 'Marinalva Bezerra da Silva',
            'diagnostic' => 'CID 10 F 84.0 (Autismo Infantil)',
            'especialist' => 'Dra Alessandra Rose Resende Jacob',
            'description' => 'Com relatos da mãe,  Gustavo Bezerra da Silva, é o quarto filho, nasceu no dia 10 de agosto de dois mil e doze, no Hospital São José em Balsas –MA, de parto cesariano, dentro do período já esperado conforme indicava o acompanhamento médico. Gustavo nasceu com aproximadamente 3,5kg, 53cm, com a cor natural, sem nenhuma má formação, para a família foi um momento de muita alegria. Recebeu sua primeira alimentação ao nascer, recebeu alimentação natural, o seio, até 2 anos de idade, e até os 3 anos recebeu a mamadeira, iniciando sua alimentação sólida aos 9 meses. Sempre teve um sono tranquilo, dormindo mais ou menos 9hs por noite. Ele engatinhou por volta dos 9 meses de idade e caminhou com 1 ano e 3 meses. 
            Gustavo sente um pouco de dificuldade motora para pegar no lápis, no garfo e na colher. Quanto a evolução da linguagem Gustavo iniciou os balbucios com 1 ano, e falou as primeiras palavras com 1 ano e 6 meses, ele as vezes utiliza gestos para se comunicar, na fala comete troca de letras do p pelo b, raramente cumpre as ordens simples, necessitando insistir no comando, ainda não consegue transmitir recados, nem repetir histórias que ouviu. Gustavo tem dificuldade para fazer amigos, prefere brincar sozinho, se dar muito bem com os pais, diante de situações novas reage bem, faz o que necessita, depois perde o interesse.
            Com mais ou menos dois anos de idade ele gostava de ficar sentado, parado e observando o nada por alguns minutos, a mãe começou a estranhar aquela atitude, já falava algumas palavrinhas e regrediu, então a mãe procurou um neuropediatra em Teresina-PI onde teve o diagnóstico de déficit de atenção, depois com o acompanhamento veio o diagnóstico de autismo.
            Ele não gosta de brincar com brinquedos, não gosta de pintar, e tem preferência por letras, formar o nome PIXAR, TV Kids, também pronuncia falas em inglês, imitando os desenhos, filmes. Ele possui dificuldade em manter um contato visual e apresenta algumas estereotipias com mãos e barulhos com a boca.',
            'workspace_uuid' => $workspace->uuid,
            'specialist_uuid' => $specialist->uuid
        ];

        $response = $this->post(route('api.form.store'), $data);
        $forms = $response->json();

        $response->assertStatus(200);
        $this->assertEquals(22, count($forms['data']));
        $this->assertNotNull($forms);
    }

    /** @test */
    public function user_try_update_forms_user()
    {
        $user = $this->signIn();
        $workspace = $this->workspace();
        $specialist = Specialist::factory()->create([
            'workspace_id' => $workspace->id,
        ]);
        $form = Form::factory()->create([
            'workspace_id' => $workspace->id,
            'specialist_id' => $specialist->id,
            'user_id' => $user->id
        ]);

        $data = [
            'uuid' => $form->uuid,
            'name' => 'Form Updated'
        ];
        $response = $this->put(route('api.form.update'), $data);
        $form = $response->json();

        $response->assertStatus(200);
        $this->assertNotNull($form);
        $this->assertEquals(22, count($form['data']));
    }

    /** @test */
    public function user_try_get_forms_by_user()
    {
        $user = $this->signIn();
        $workspace = $this->workspace();
        $specialist = Specialist::factory()->create([
            'workspace_id' => $workspace->id,
        ]);
        $forms = Form::factory()->create([
            'workspace_id' => $workspace->id,
            'specialist_id' => $specialist->id,
            'user_id' => $user->id
        ]);

        $response = $this->get(route('api.form.show'));
        $forms = $response->json();
        $response->assertStatus(200);
        $this->assertNotNull($forms);
    }

    /** @test */
    public function user_try_delete_forms_by_uuid()
    {
        $user = $this->signIn();
        $workspace = $this->workspace();
        $specialist = Specialist::factory()->create([
            'workspace_id' => $workspace->id,
        ]);
        $form = Form::factory()->create([
            'workspace_id' => $workspace->id,
            'specialist_id' => $specialist->id,
            'user_id' => $user->id
        ]);

        $form = Form::first();
        $data = [
            'uuid' => $form->uuid
        ];

        $response = $this->delete(route('api.form.destroy'), $data);
        $response->json();

        $response->assertStatus(200);
    }

    /** @test */
    public function user_try_create_forms_user_and_attach_skills()
    {
        $workspace = $this->workspace();
        $specialist = Specialist::factory()->create([
            'workspace_id' => $workspace->id
        ]);
        $skills = $this->createSkills();
        $data = [
            'title' => 'Plano de estudo 3° B',
            'name' => 'Gustavo Bezerra da Silva',
            'year' => '4°',
            'class' => 'A',
            'bout' => 'Matutino',
            'birthdate' => '10/08/2012',
            'father' => 'Adilson Carlos da Silva',
            'mother' => 'Marinalva Bezerra da Silva',
            'diagnostic' => 'CID 10 F 84.0 (Autismo Infantil)',
            'especialist' => 'Dra Alessandra Rose Resende Jacob',
            'description' => 'Com relatos da mãe,  Gustavo Bezerra da Silva, é o quarto filho, nasceu no dia 10 de agosto de dois mil e doze, no Hospital São José em Balsas –MA, de parto cesariano, dentro do período já esperado conforme indicava o acompanhamento médico. Gustavo nasceu com aproximadamente 3,5kg, 53cm, com a cor natural, sem nenhuma má formação, para a família foi um momento de muita alegria. Recebeu sua primeira alimentação ao nascer, recebeu alimentação natural, o seio, até 2 anos de idade, e até os 3 anos recebeu a mamadeira, iniciando sua alimentação sólida aos 9 meses. Sempre teve um sono tranquilo, dormindo mais ou menos 9hs por noite. Ele engatinhou por volta dos 9 meses de idade e caminhou com 1 ano e 3 meses. 
             Gustavo sente um pouco de dificuldade motora para pegar no lápis, no garfo e na colher. Quanto a evolução da linguagem Gustavo iniciou os balbucios com 1 ano, e falou as primeiras palavras com 1 ano e 6 meses, ele as vezes utiliza gestos para se comunicar, na fala comete troca de letras do p pelo b, raramente cumpre as ordens simples, necessitando insistir no comando, ainda não consegue transmitir recados, nem repetir histórias que ouviu. Gustavo tem dificuldade para fazer amigos, prefere brincar sozinho, se dar muito bem com os pais, diante de situações novas reage bem, faz o que necessita, depois perde o interesse.
             Com mais ou menos dois anos de idade ele gostava de ficar sentado, parado e observando o nada por alguns minutos, a mãe começou a estranhar aquela atitude, já falava algumas palavrinhas e regrediu, então a mãe procurou um neuropediatra em Teresina-PI onde teve o diagnóstico de déficit de atenção, depois com o acompanhamento veio o diagnóstico de autismo.
             Ele não gosta de brincar com brinquedos, não gosta de pintar, e tem preferência por letras, formar o nome PIXAR, TV Kids, também pronuncia falas em inglês, imitando os desenhos, filmes. Ele possui dificuldade em manter um contato visual e apresenta algumas estereotipias com mãos e barulhos com a boca.',
            'workspace_uuid' => $workspace->uuid,
            'specialist_uuid' => $specialist->uuid,
            'skills' => [
                [
                    'uuid' => $skills[3]['uuid'],
                    'helper' => 'Trabalhar em duplas ou grupo'
                ],
                [
                    'uuid' => $skills[23]['uuid'],
                    'helper' => 'Melhorar as habilidades de atenção,
                    concentração, memória, percepção visual'
                ],
                [
                    'uuid' => $skills[12]['uuid'],
                    'helper' => 'Trabalhar em duplas ou grupo'
                ],
                [
                    'uuid' => $skills[7]['uuid'],
                    'helper' => 'Desenvolver a imaginação e
                    criatividade'
                ]
            ]
        ];

        $response = $this->post(route('api.form.store'), $data);
        $forms = $response->json();

        $response->assertStatus(200);
        $this->assertEquals(22, count($forms['data']));
        $this->assertNotNull($forms);
    }

    /** @test */
    public function user_try_create_forms_user_and_attach_specialtys()
    {
        $workspace = $this->workspace();
        $specialist = Specialist::factory()->create([
            'workspace_id' => $workspace->id
        ]);

        $skills = $this->createSkills();
        $data = [
            'title' => 'Plano de estudo 3° B',
            'name' => 'Gustavo Bezerra da Silva',
            'year' => '4°',
            'class' => 'A',
            'bout' => 'Matutino',
            'birthdate' => '10/08/2012',
            'father' => 'Adilson Carlos da Silva',
            'mother' => 'Marinalva Bezerra da Silva',
            'diagnostic' => 'CID 10 F 84.0 (Autismo Infantil)',
            'especialist' => 'Dra Alessandra Rose Resende Jacob',
            'description' => 'Com relatos da mãe,  Gustavo Bezerra da Silva, é o quarto filho, nasceu no dia 10 de agosto de dois mil e doze, no Hospital São José em Balsas –MA, de parto cesariano, dentro do período já esperado conforme indicava o acompanhamento médico. Gustavo nasceu com aproximadamente 3,5kg, 53cm, com a cor natural, sem nenhuma má formação, para a família foi um momento de muita alegria. Recebeu sua primeira alimentação ao nascer, recebeu alimentação natural, o seio, até 2 anos de idade, e até os 3 anos recebeu a mamadeira, iniciando sua alimentação sólida aos 9 meses. Sempre teve um sono tranquilo, dormindo mais ou menos 9hs por noite. Ele engatinhou por volta dos 9 meses de idade e caminhou com 1 ano e 3 meses. 
             Gustavo sente um pouco de dificuldade motora para pegar no lápis, no garfo e na colher. Quanto a evolução da linguagem Gustavo iniciou os balbucios com 1 ano, e falou as primeiras palavras com 1 ano e 6 meses, ele as vezes utiliza gestos para se comunicar, na fala comete troca de letras do p pelo b, raramente cumpre as ordens simples, necessitando insistir no comando, ainda não consegue transmitir recados, nem repetir histórias que ouviu. Gustavo tem dificuldade para fazer amigos, prefere brincar sozinho, se dar muito bem com os pais, diante de situações novas reage bem, faz o que necessita, depois perde o interesse.
             Com mais ou menos dois anos de idade ele gostava de ficar sentado, parado e observando o nada por alguns minutos, a mãe começou a estranhar aquela atitude, já falava algumas palavrinhas e regrediu, então a mãe procurou um neuropediatra em Teresina-PI onde teve o diagnóstico de déficit de atenção, depois com o acompanhamento veio o diagnóstico de autismo.
             Ele não gosta de brincar com brinquedos, não gosta de pintar, e tem preferência por letras, formar o nome PIXAR, TV Kids, também pronuncia falas em inglês, imitando os desenhos, filmes. Ele possui dificuldade em manter um contato visual e apresenta algumas estereotipias com mãos e barulhos com a boca.',
            'workspace_uuid' => $workspace->uuid,
            'specialist_uuid' => $specialist->uuid,
            'skills' => [
                [
                    'uuid' => $skills[3]['uuid'],
                    'helper' => 'Trabalhar em duplas ou grupo'
                ],
                [
                    'uuid' => $skills[23]['uuid'],
                    'helper' => 'Melhorar as habilidades de atenção,
                    concentração, memória, percepção visual'
                ]
            ],
            'specialtys' => [
                [
                    [
                        'name' => 'Fonoaldiologa',
                        'location' => 'APAE',
                        'professional' => 'Alexandro Mendes',
                        'day' => '2° Feira',
                        'hour' => 'Manha',
                        'contact' => ' (99) 98746-2343'
                    ],
                    [
                        'name' => 'Psicopedagoga',
                        'location' => 'APAE',
                        'professional' => 'Morena da calçada',
                        'day' => '2° Feira',
                        'hour' => 'Manha',
                        'contact' => ' (99) 98746-2343'
                    ]
                ]
            ]
        ];

        $response = $this->post(route('api.form.store'), $data);
        $forms = $response->json();

        $response->assertStatus(200);
        $this->assertEquals(22, count($forms['data']));
        $this->assertNotNull($forms);
    }

    /** @test */
    public function user_try_create_forms_user_and_attach_goals()
    {
        $workspace = $this->workspace();
        $specialist = Specialist::factory()->create([
            'workspace_id' => $workspace->id
        ]);

        $skills = $this->createSkills();
        $data = [
            'title' => 'Plano de estudo 3° B',
            'name' => 'Gustavo Bezerra da Silva',
            'year' => '4°',
            'class' => 'A',
            'bout' => 'Matutino',
            'birthdate' => '10/08/2012',
            'father' => 'Adilson Carlos da Silva',
            'mother' => 'Marinalva Bezerra da Silva',
            'diagnostic' => 'CID 10 F 84.0 (Autismo Infantil)',
            'especialist' => 'Dra Alessandra Rose Resende Jacob',
            'description' => 'Com relatos da mãe,  Gustavo Bezerra da Silva, é o quarto filho, nasceu no dia 10 de agosto de dois mil e doze, no Hospital São José em Balsas –MA, de parto cesariano, dentro do período já esperado conforme indicava o acompanhamento médico. Gustavo nasceu com aproximadamente 3,5kg, 53cm, com a cor natural, sem nenhuma má formação, para a família foi um momento de muita alegria. Recebeu sua primeira alimentação ao nascer, recebeu alimentação natural, o seio, até 2 anos de idade, e até os 3 anos recebeu a mamadeira, iniciando sua alimentação sólida aos 9 meses. Sempre teve um sono tranquilo, dormindo mais ou menos 9hs por noite. Ele engatinhou por volta dos 9 meses de idade e caminhou com 1 ano e 3 meses. 
             Gustavo sente um pouco de dificuldade motora para pegar no lápis, no garfo e na colher. Quanto a evolução da linguagem Gustavo iniciou os balbucios com 1 ano, e falou as primeiras palavras com 1 ano e 6 meses, ele as vezes utiliza gestos para se comunicar, na fala comete troca de letras do p pelo b, raramente cumpre as ordens simples, necessitando insistir no comando, ainda não consegue transmitir recados, nem repetir histórias que ouviu. Gustavo tem dificuldade para fazer amigos, prefere brincar sozinho, se dar muito bem com os pais, diante de situações novas reage bem, faz o que necessita, depois perde o interesse.
             Com mais ou menos dois anos de idade ele gostava de ficar sentado, parado e observando o nada por alguns minutos, a mãe começou a estranhar aquela atitude, já falava algumas palavrinhas e regrediu, então a mãe procurou um neuropediatra em Teresina-PI onde teve o diagnóstico de déficit de atenção, depois com o acompanhamento veio o diagnóstico de autismo.
             Ele não gosta de brincar com brinquedos, não gosta de pintar, e tem preferência por letras, formar o nome PIXAR, TV Kids, também pronuncia falas em inglês, imitando os desenhos, filmes. Ele possui dificuldade em manter um contato visual e apresenta algumas estereotipias com mãos e barulhos com a boca.',
            'workspace_uuid' => $workspace->uuid,
            'specialist_uuid' => $specialist->uuid,
            'skills' => [
                [
                    'uuid' => $skills[3]['uuid'],
                    'helper' => 'Trabalhar em duplas ou grupo'
                ],
                [
                    'uuid' => $skills[23]['uuid'],
                    'helper' => 'Melhorar as habilidades de atenção,
                    concentração, memória, percepção visual'
                ]
            ],
            'specialtys' => [
                [
                    [
                        'name' => 'Fonoaldiologa',
                        'location' => 'APAE',
                        'professional' => 'Alexandro Mendes',
                        'day' => '2° Feira',
                        'hour' => 'Manha',
                        'contact' => ' (99) 98746-2343'
                    ],
                    [
                        'name' => 'Psicopedagoga',
                        'location' => 'APAE',
                        'professional' => 'Morena da calçada',
                        'day' => '2° Feira',
                        'hour' => 'Manha',
                        'contact' => ' (99) 98746-2343'
                    ]
                ]
            ],
            'goals' => [
                [
                    [
                        'type' => 'Matematica',
                        'goal' => 'Desenvolver habilidade de resolução de problemas',
                        'period' => 'Segundo semestre',
                        'perfomance' => 'Conta de 0 a 50
                        Resolve continhas simples de adição e subtração',
                        'strategy' => '• Desenvolver sua capacidade de enteração com as outras crianças;
                        • Usar material concreto para compreender o que deve ser feito;
                        • Conversar sobre o enunciado para melhor compreensão;',
                        'resource' => 'Tablet, jogos didáticos, material dourado, lápis de cor e atividades adaptadas;',
                    ]
                ]
            ]
        ];

        $response = $this->post(route('api.form.store'), $data);
        $forms = $response->json();

        $response->assertStatus(200);
        $this->assertEquals(22, count($forms['data']));
        $this->assertNotNull($forms);
    }
}
