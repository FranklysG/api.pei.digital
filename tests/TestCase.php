<?php

namespace Tests;

use App\Models\Skill;
use App\Models\User;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;
    protected $connectionsToTransact = ['mysql','mysql-logs'];

    public function signIn() : User
    {
        $user = User::factory()->create();
        Auth::login($user);
        return $user;
    }

    public function workspace() : Workspace
    {
        $user = $this->signIn();
        $workspace = Workspace::factory()->create();
        UserWorkspace::factory()->create([
            'user_id' => $user->id,
            'workspace_id' => $workspace->id
        ]);

        return $workspace;
    }

    public function createSkills() {
        $skills = [
            ['type' => 'Habilidades Cognitivas', 'title' => 'Atenção em sala de aula'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Manter interesse no ambiente escolar'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Possuir concentração nas atividades propostas'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Possuir memória auditiva-visual-sequencial'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Possuir raciocínio lógico-matemático'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Realizar sequência lógica dos fatos'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Possuir interesse por objetos'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Elaborar a exploração adequada dos objetos'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Realizar a comparação - Associação - Classificação'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Realizar abstração (conduta simbólica)'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Possuir discriminação visual-auditiva-táctil'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Possuir organização'],
            ['type' => 'Habilidades Cognitivas', 'title' => 'Apresentar noções de autopreservação'],
            ['type' => 'Habilidades Metacognitivas', 'title' => 'Conhecer o próprio conhecimento, conhecimento da falta de conhecimento, dos próprios processos cognitivos e controle executivo.'],
            ['type' => 'Habilidades Metacognitivas', 'title' => 'Utilizar estratégias para adquirir, organizar e utilizar o conhecimento.'],
            ['type' => 'Habilidades Metacognitivas', 'title' => 'Planejar as próprias ações'],
            ['type' => 'Habilidades Metacognitivas', 'title' => 'Estabelecer estratégias'],
            ['type' => 'Habilidades Metacognitivas', 'title' => 'Avaliar'],
            ['type' => 'Habilidades Metacognitivas', 'title' => 'Executar correções'],
            ['type' => 'Habilidades Metacognitivas', 'title' => 'Julgar adequadamente as situações'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Relacionar-se socialmente'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Possuir autoestima – Resistência e frustação'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Possuir cooperação – Humor – Agressividade'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Apresentar autoagressão'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Apresentar timidez – Iniciativa – Respeito'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Apresentar colaboração – motivação – Isolamento'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Respeitar regras e rotina'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Apresentar iniciativa social'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Manter comportamento adequado em público'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Conseguir permanecer em sala (tempo)'],
            ['type' => 'Habilidades socioemocionais', 'title' => 'Ter foco nas atividades'],
            ['type' => 'Habilidades comunicacionais', 'title' => 'Atender quando solicitado'],
            ['type' => 'Habilidades comunicacionais', 'title' => 'Compreender o que é falado'],
            ['type' => 'Habilidades comunicacionais', 'title' => 'Apropriar-se das diferentes formas de comunicação; olhar, gestos, expressão facial, movimentos de cabeça, sons guturais, LIBRAS Tecnologia Assistiva utilizada; Comunicação Assistiva'],
            ['type' => 'Habilidades comunicacionais', 'title' => 'Falar palavras inteligíveis'],
            ['type' => 'Habilidades comunicacionais', 'title' => 'Adequar-se às situações de comunicação'],
            ['type' => 'Habilidades comunicacionais', 'title' => 'Realizar muito esforço para comunicar-se'],
            ['type' => 'Habilidades comunicacionais', 'title' => 'Apresentar correspondência entre pensamento/fala'],
            ['type' => 'Habilidades comunicacionais', 'title' => 'Relatar experiências pessoais'],
            ['type' => 'Habilidades comunicacionais', 'title' => 'Transmitir recados'],
            ['type' => 'Habilidades comunicacionais', 'title' => 'Controlar salivação'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Permanecer sentado com/sem apoio'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Rolar, engatinhar, arrastar-se'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Andar com/sem apoio'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Correr, pular, cair com frequência'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Possuir equilíbrio estático/dinâmico'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Possuir dominância manual - esquema corporal'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Possuir discriminação de direita/esquerda'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Apresentar coordenação grossa/fina'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Apresentar coordenação gráfica/visomotora'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Apresentar conceitos básicos (cores/posição no \nespaço, etc.)'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Ser capaz de empurrar/aprender/manipular/\nMantém objetos'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Ser capaz de realizar atividades bimanuais – \nTipo de preensão do lápis'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Ser capaz de usar borracha/tesoura – Presença\nde estereotipias'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Possuir agitação psicomotora'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Possuir adequação postural – Desenvolvimento\nMotor'],
            ['type' => 'Habilidades Motoras/Psicomotoras', 'title' => 'Possuir coordenação Motora – Equilíbrio']
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        return Skill::get();
    }

}
