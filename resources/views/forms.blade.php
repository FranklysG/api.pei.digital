<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Formulário PEI</title>
    <meta name="description" content="Basic HTML/Tailwind starter" />
    <meta name="author" content="Daily Dev Tips" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <header>
        <div style="
                    display: grid;
                    width: 100vw;
                    place-items: center;
                    text-align: center;
                    font-size: 12px;
                    margin: 10px 0 10px 0;
                ">
            <h5>
                SECRETARIA MUNICIPAL DE EDUCAÇÃO <br />
                DEPARTAMENTO DE EDUCAÇÃO ESPECIAL
            </h5>
        </div>

        <h3 style="
                    text-align: center;
                    font-weight: 600;
                ">
            PROGRAMA EDUCACIONAL INDIVIDUALIZADO
        </h3>

        <h4 style="margin: 0 10px 48px; font-weight: 600">
            ESCOLA MUNICIPAL ELIAS ALFREDO CURY <br />
            LÍDER DA EQUIPE PEI:
            <span style="font-weight: 400; margin-left: 12px">Rosangela O. B. Marx</span>
            <br />
            OUTROS MEMBROS DA EQUIPE:
            <span style="font-weight: 400; margin-left: 12px">Ana Lucia Gomes Pereira, Iones de Freitas Messias, Girlene
                Saraiva de Andrade, Raimunda Nunes Pimentel, Mauricélia,
                Rosângela Bispo.</span>
        </h4>
    </header>
    <main style="
                width: 100vw;
                font-weight: 600;
                text-align: justify;
            ">
        <ol style="list-style-type: decimal">
            <li style="margin-bottom: 5px">Identificação do aluno</li>
            <h4>
                Nome:
                <span style="font-weight: 400; margin-left: 10px">{{
                        $data["name"]
                    }}</span>
            </h4>
            <h4>
                Ano:
                <span style="font-weight: 400; margin: 10px">{{
                        $data["year"]
                    }}</span>
                Turma:
                <span style="font-weight: 400; margin: 10px">{{
                        $data["class"]
                    }}</span>
                Turno:
                <span style="font-weight: 400; margin-left: 10px">{{
                        $data["bout"]
                    }}</span>
            </h4>
            <h4>
                Data de Nascimento:
                <span style="font-weight: 400; margin-left: 10px">{{
                        $data["birthdate"]
                    }}</span>
            </h4>
            <h4>
                Pai:
                <span style="font-weight: 400; margin: 10px">{{
                        $data["father"]
                    }}</span>
                Mãe:
                <span style="font-weight: 400; margin: 10px">{{
                        $data["mother"]
                    }}</span>
            </h4>

            <li style="margin: 35px 0 5px">
                Diagnóstico e a data do último laudo:
            </li>
            <span style="font-weight: 400">{{ $data["diagnostic"] }} Data: {{ $data["date"] }}</span>

            <li style="margin: 35px 0 5px">
                Nome e Especialidade do profissional responsável pelo
                diagnóstico:
            </li>
            <span style="font-weight: 400">{{ $data["medical"] }}</span>

            <li style="margin: 35px 0 5px">
                Dados obtidos através da família e da equipe que acompanha o
                caso:
            </li>
            <span style="font-weight: 400">{{ $data["description"] }}
            </span>

            <li style="margin: 35px 0 5px">
                Realiza algum tipo de atendimento clínico, terapêutico ou
                atividades extracurriculares?
            </li>

            <table style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: 100%;
                    ">
                <thead>
                    <tr style="
                                background-color: rgba(209, 213, 219, 1);
                                padding: 8px;
                                text-align: center;
                            ">
                        <th style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                    min-width: 70px;
                                ">
                            Especialidade
                        </th>
                        <th style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                    min-width: 70px;
                                ">
                            Local
                        </th>
                        <th style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                    min-width: 70px;
                                ">
                            Profissional
                        </th>
                        <th style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                    min-width: 70px;
                                ">
                            Dia
                        </th>
                        <th style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                    min-width: 70px;
                                ">
                            Horário
                        </th>
                        <th style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                    min-width: 70px;
                                ">
                            Contato
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $data['specialty'] as $value)
                    <tr style="font-weight: 400; text-align: center">
                        <td style="border: 1px solid black">
                            <span>{{ $value["name"] }}</span>
                        </td>
                        <td style="border: 1px solid black">
                            <span>{{ $value["location"] }}</span>
                        </td>
                        <td style="border: 1px solid black">
                            <span>{{ $value["professional"] }}</span>
                        </td>
                        <td style="border: 1px solid black">
                            <span>{{ $value["day"] }}</span>
                        </td>
                        <td style="border: 1px solid black">
                            <span>{{ $value["hour"] }}</span>
                        </td>
                        <td style="border: 1px solid black">
                            <span>{{ $value["contact"] }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 style="margin-top: 28px">
                A Escola poderá fazer contato com os profissionais que
                atendem o aluno, para o desenvolvimento do trabalho
                pedagógico? <br />(<span>{{$data['specialist_bool'] == '1' ? 'x' : ' '}}</span>)Sim (<span>{{$data['specialist_bool'] == '0' || $data['specialist_bool'] == null ? 'x' : ' '}}</span>)Não
            </h4>

            <li style="margin: 35px 0 5px">
                Expectativas/Contribuição da família
            </li>
            <span style="font-weight: 400">{{$data['family_description']}}</span>

            <li style="margin: 35px 0 5px">Diagnóstico Pedagógico</li>

            @foreach ($data['skills'] as $key => $value)
            <table style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: 100%;
                    ">
                <th style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        " colspan="2">
                    {{ $value[0]['type'] }}
                </th>
                <tr>
                    <td style="
                                width: 280px;
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            ">
                        Habilidades/Potencialidades
                    </td>
                    <td style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            ">
                        Aspectos que precisam ser potencializados
                    </td>
                </tr>

                @foreach ($value as $item)
                <tr>
                    <td style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            ">
                        <span style="font-weight: 400">
                            {{ $item["title"] }}</span>
                    </td>
                    <td style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            ">
                        <span style="font-weight: 400">{{
                                $item["helper"]
                            }}</span>
                    </td>
                </tr>
                @endforeach
            </table>
            @endforeach

            <li style="margin: 35px 0 5px">Objetivos do programa</li>
            <span style="font-weight: 400">
                {{$data['objective']}}
            </span>

            <li style="margin: 35px 0 5px">Metas:</li>

            @foreach ($data['goals'] as $key => $value)

            <table style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: 100%;
                    ">
                <th style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        " colspan="5">
                    @switch($value[0]['type'])
                    @case('matematica')
                    Matemática
                    @break
                    @case('linguagens')
                    Linguagens ( Lingua Portuguesa, Lingua Inglesa, Arte, Educ. Física)
                    @break
                    @case('natureza')
                    Ciências da Natureza
                    @break
                    @case('humanas')
                    Ciências Humanas (História e Geografia)
                    @break
                    @case('religiao')
                    Ensino Religioso
                    @break
                    @default
                    Ensino Religioso
                    @endswitch
                </th>
                <tr>
                    <th style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                                width: 100px;
                            ">
                        Metas
                    </th>
                    <th style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                                width: 100px;
                            ">
                        Período
                    </th>
                    <th style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                                width: 100px;
                            ">
                        Desempenho Atual
                    </th>
                    <th style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                                width: 100px;
                            ">
                        Estratégia e Intervenções Pedagógicas
                    </th>
                    <th style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                                width: 100px;
                            ">
                        Recursos
                    </th>
                </tr>

                @foreach($value as $item)
                <tr>
                    <td style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            ">
                        <span style="font-weight: 400">{{
                                $item["goal"]
                            }}</span>
                    </td>
                    <td style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            ">
                        <span style="font-weight: 400">{{
                                $item["period"]
                            }}</span>
                    </td>
                    <td style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            ">
                        <span style="font-weight: 400">
                            {{ $item["perfomance"] }}</span>
                    </td>
                    <td style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            ">
                        <span style="font-weight: 400">
                            {{ $item["strategy"] }}</span>
                    </td>
                    <td style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            ">
                        <span style="font-weight: 400">{{
                                $item["resource"]
                            }}</span>
                    </td>
                </tr>
                @endforeach
            </table>
            @endforeach

            <li style="margin: 35px 0 5px">Proposta de Intervenção:</li>
            <h4 style="line-height: 30px">
                (<span>{{$data['proposal_one'] == 1 ? 'x' : ' '}}</span>) Mediação individual nas atividades e
                avaliações.<br />
                (<span>{{$data['proposal_two'] == 1 ? 'x' : ' '}}</span>) Trabalhar os conceitos/conteúdos no
                concreto.<br />
                (<span>{{$data['proposal_three'] == 1 ? 'x' : ' '}}</span>) Proporcionar tempo estendido para
                realização de atividades e avaliações.<br />
                (<span>{{$data['proposal_four'] == 1 ? 'x' : ' '}}</span>) Reduzir textos e enunciados para melhor
                compreensão.<br />
                (<span>{{$data['proposal_five'] == 1 ? 'x' : ' '}}</span>) Questões objetivas.<br />
                (<span>{{$data['proposal_six'] == 1 ? 'x' : ' '}}</span>) Correção diferenciada nas avaliações.<br />
                (<span>{{$data['proposal_seven'] == 1 ? 'x' : ' '}}</span>) Adaptação Curricular.<br />
                (<span>{{$data['proposal_eigth'] == 1 ? 'x' : ' '}}</span>) Outro: <span></span>
            </h4>

            <li style="margin: 35px 0 5px">
                Objetivo das adaptações curriculares:
            </li>
            <span style="font-weight: 400">{{$data['objective_adaptive']}}</span>
            <li style="margin: 35px 0 5px">
                Ações adaptativas por cada área de conhecimento:
            </li>
            <span style="font-weight: 400">{{$data['action_adaptive']}}</span>
            <li style="margin: 35px 0 5px">
                Recursos de tecnologia assistiva:
            </li>
            <span style="font-weight: 400">{{$data['resources_tech']}}</span>
            <li style="margin: 35px 0 5px">Recursos avaliativos:</li>
            <span style="font-weight: 400">{{$data['resources_avaliation']}}</span>
            <li style="margin: 35px 0 5px">Parecer Semestral:</li>
            <span style="font-weight: 400">{{$data['conclusion']}}</span>
        </ol>

        <div>
            <hr style="margin-top: 80px" />

            <h1 style="
                        margin-top: 80px;
                        text-align: center;
                        font-weight: 600;
                        font-size: 18px;
                    ">
                TERMO DE CIÊNCIA
            </h1>

            <div style="
                        text-align: justify;
                        margin: 30px 10px 5px 10px;
                        line-height: 23px;
                    ">
                <p>
                    É imprescindível a família acompanhar e promover o
                    desenvolvimento do (a) aluno (a) em suas áreas
                    cognitivas, emocionais e sociais, firmando assim
                    parceria com a escola.
                </p>

                <br />

                <p>
                    Eu,
                    <span>___________________________________________</span>, responsável pelo (a) aluno (a)
                    <span>___________________________</span>, turma
                    <span>_____________________</span>, recebi as
                    informações e orientações a respeito do Programa de
                    Ensino INDIVIDUALIZADO(PEI) para melhor atender as
                    necessidades do (a) aluno (a) e assim promover o seu
                    aprendizado. Como família comprometo-me a atualizar as
                    informações médicas do (a) aluno (a), como dos
                    especialistas que o (a) acompanham, e informar ao
                    colégio as necessidades específicas deste (desta).
                </p>
            </div>

            <p style="text-align: right; margin: 30px 94px 30px 94px">
                Cientes, assinam nesta data: <span>___</span> /
                <span>___</span> / <span>___</span>
            </p>

            <p style="margin-top: 90px; text-align: center">
                <span>____________________________________</span> <br />
                Responsável
            </p>

            <div style="
                        text-align: center;
                        display: flex;
                        justify-content: space-between;
                        margin: 40px 80px 0 80px;
                    ">
                <p>
                    <span>____________________________</span> <br />
                    Professor de AEE
                </p>
                <p>
                    <span style="margin-top: 140px">____________________________</span>
                    <br />
                    Coordenadora Pedagógica
                </p>
            </div>
        </div>
    </main>

    <footer>
        <div style="
                    display: grid;
                    width: 100vw;
                    place-items: center;
                    text-align: center;
                    font-size: 12px;
                    margin: 130px 0 10px 0;
                ">
            <img style="width: 130px" src="../assets/logoprefeiturabalsas.svg" alt="Logo da Prefeitura de Balsas" />
            <h5>
                SECRETARIA MUNICIPAL DE EDUCAÇÃO <br />
                DEPARTAMENTO DE EDUCAÇÃO ESPECIAL
            </h5>
        </div>
    </footer>
</body>

</html>