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
            <div
                style="
                    display: grid;
                    width: 100vw;
                    place-items: center;
                    text-align: center;
                    font-size: 12px;
                    margin: 10px 0 10px 0;
                "
            >
                <img
                    style="width: 130px"
                    src="../assets/logoprefeiturabalsas.svg"
                    alt="Logo da Prefeitura de Balsas"
                />
                <h5>
                    SECRETARIA MUNICIPAL DE EDUCAÇÃO <br />
                    DEPARTAMENTO DE EDUCAÇÃO ESPECIAL
                </h5>
            </div>

            <h3
                style="
                    text-align: center;
                    margin: 35px 0 35px 0;
                    font-weight: 600;
                "
            >
                PROGRAMA EDUCACIONAL INDIVIDUALIZADO
            </h3>

            <h4 style="margin: 0 10px 48px; font-weight: 600">
                ESCOLA MUNICIPAL ELIAS ALFREDO CURY <br />
                LÍDER DA EQUIPE PEI:
                <span style="font-weight: 400; margin-left: 12px"
                    >Rosangela O. B. Marx</span
                >
                <br />
                OUTROS MEMBROS DA EQUIPE:
                <span style="font-weight: 400; margin-left: 12px"
                    >Ana Lucia Gomes Pereira, Iones de Freitas Messias, Girlene
                    Saraiva de Andrade, Raimunda Nunes Pimentel, Mauricélia,
                    Rosângela Bispo.</span
                >
            </h4>
        </header>
        <main
            style="
                width: 100vw;
                font-weight: 600;
                text-align: justify;
                margin: 8px 38px;
            "
        >
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
                <span style="font-weight: 400"
                    >{{ $data["diagnostic"] }} Data: {{ $data["date"] }}</span
                >

                <li style="margin: 35px 0 5px">
                    Nome e Especialidade do profissional responsável pelo
                    diagnóstico:
                </li>
                <span style="font-weight: 400"
                    >{{ $data["especialist"] }} – Médica psiquiátrica – Goiania
                    GO</span
                >

                <li style="margin: 35px 0 5px">
                    Dados obtidos através da família e da equipe que acompanha o
                    caso:
                </li>
                <span style="font-weight: 400"
                    >{{ $data["description"] }}
                </span>

                <li style="margin: 35px 0 5px">
                    Realiza algum tipo de atendimento clínico, terapêutico ou
                    atividades extracurriculares?
                </li>

                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <thead>
                        <tr
                            style="
                                background-color: rgba(209, 213, 219, 1);
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            <th
                                style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                "
                            >
                                Especialidade
                            </th>
                            <th
                                style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                "
                            >
                                Local
                            </th>
                            <th
                                style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                "
                            >
                                Profissional
                            </th>
                            <th
                                style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                "
                            >
                                Dia
                            </th>
                            <th
                                style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                "
                            >
                                Horário
                            </th>
                            <th
                                style="
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: center;
                                "
                            >
                                Contato
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr style="font-weight: 400; text-align: center">
                            <td style="border: 1px solid black">
                                <span>Fonoaudióloga</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span>APAE</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span></span>
                            </td>
                            <td style="border: 1px solid black">
                                <span>2ª feira</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span>Manhã</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span></span>
                            </td>
                        </tr>

                        <tr style="font-weight: 400; text-align: center">
                            <td style="border: 1px solid black">
                                <span>Psicopedagoga</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span>APAE</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span></span>
                            </td>
                            <td style="border: 1px solid black">
                                <span>2ª feira</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span>Manhã</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span></span>
                            </td>
                        </tr>

                        <tr style="font-weight: 400; text-align: center">
                            <td style="border: 1px solid black">
                                <span>Terapeuta Ocupacional</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span>APAE</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span></span>
                            </td>
                            <td style="border: 1px solid black">
                                <span>2ª feira</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span>Manhã</span>
                            </td>
                            <td style="border: 1px solid black">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h4 style="margin-top: 28px">
                    A Escola poderá fazer contato com os profissionais que
                    atendem o aluno, para o desenvolvimento do trabalho
                    pedagógico? <br />(<span></span>)Sim (<span></span>)Não
                </h4>

                <li style="margin: 35px 0 5px">
                    Expectativas/Contribuição da família
                </li>
                <span style="font-weight: 400"
                    >A mãe nos relatou sua preocupação sobre o crescimento de
                    Gustavo, em casa ainda não consegue escovar os dentes, tomar
                    banho e usar o banheiro sozinho e na hora de se alimentar
                    come de boca aberta. Também falou que ele está participando
                    na igreja, faz apresentação e desenvolve bem quando é o
                    primeiro ou o último a apresentar. Espera melhoras na
                    leitura - Ler com fluência; interação com os colegas,
                    brinque; focar no que lhe é proposto.</span
                >

                <li style="margin: 35px 0 5px">Diagnóstico Pedagógico</li>
                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="2"
                    >
                        Aspectos Cognitivos
                    </th>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            Habilidades/Potencialidades
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            Aspectos que precisam ser potencializados
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            <span style="font-weight: 400">
                                • Responsabilidade social <br />
                                • Atenção no atendimento individual, mesmo por
                                poucos minutos <br />
                                • Possui interesse por objetos, pelo
                                concreto</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            <span style="font-weight: 400">
                                • Trabalhar em duplas ou grupo <br />
                                • Melhorar as habilidades de atenção,
                                concentração, memória, percepção visual <br />
                                • Realizar sequência lógica em historinhas,
                                livros, brincadeiras <br />
                                • Desenvolver a imaginação e criatividade</span
                            >
                        </td>
                    </tr>
                </table>

                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="2"
                    >
                        Aspectos sociais e psicoafetivos
                    </th>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            Habilidades/Potencialidades
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            Aspectos que precisam ser potencializados
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            <span style="font-weight: 400">
                                • Comunicação(cumprimenta ao chegar, ao sair,
                                mas de forma mecânica) <br />
                                • Respeita as regras e rotinas <br />
                                • Respeita as pessoas <br />
                                • Amável</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            <span style="font-weight: 400">
                                • Conseguir interagir, fazer amizades <br />
                                • Compreender e realizar as atividades propostas
                                a ele pelo professor, pois as vezes quer impor a
                                sua vontade (Ex. o que fazer no computador)
                                <br />
                                • Compreender a lógica dos jogos e atividades
                                coletivas</span
                            >
                        </td>
                    </tr>
                </table>

                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="2"
                    >
                        Aspectos Comunicacionais
                    </th>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            Habilidades/Potencialidades
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            Aspectos que precisam ser potencializados
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            <span style="font-weight: 400">
                                • Habilidades comunicativas não verbais <br />
                                • Compreende os comandos</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            <span style="font-weight: 400">
                                • Gestos <br />
                                • Utilizar a linguagem verbal, falar para
                                expressar seus desejos (Eu quero.....) <br />
                                • Correspondência entre pensamento/fala</span
                            >
                        </td>
                    </tr>
                </table>

                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="2"
                    >
                        Aspectos motoras/psicomotores
                    </th>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            Habilidades/Potencialidades
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            Aspectos que precisam ser potencializados
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            <span style="font-weight: 400">
                                • Escreve com letras grandes e somente em bastão
                                <br />
                                • Anda e se movimenta normalmente sem auxilio
                            </span>
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            <span style="font-weight: 400">
                                • Atividades com uso de tesoura, jogos e
                                atividades físicas para melhorar a coordenação
                                motora. <br />
                                • Correr, pular, segurar a bola, objetos durante
                                as brincadeiras</span
                            >
                        </td>
                    </tr>
                </table>

                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="2"
                    >
                        Aspectos do Cotidiano
                    </th>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            Habilidades/Potencialidades
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            Aspectos que precisam ser potencializados
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            <span style="font-weight: 400">
                                • Cuidadoso com seu material <br />
                                •Entende sequência lógica dos
                                horários/atividades do dia a dia escolar.<br />
                                • Sinaliza a necessidade de ir ao banheiro
                                <br />
                                • Consegue se alimentar sozinho <br />
                                • Aceita o lanche da escola (exceto quando é
                                algo pastoso)</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: justify;
                            "
                        >
                            <span style="font-weight: 400">
                                • Solicitar verbalmente quando quer ir ao
                                banheiro, lanchar, etc. <br />
                                • Utilizar mais a colher do que a mão ao se
                                alimentar. <br />
                                • Organizar seu material (tirar da mochila,
                                colocar novamente mesmo que com a ajuda de sua
                                cuidadora)</span
                            >
                        </td>
                    </tr>
                </table>

                <li style="margin: 35px 0 5px">Objetivos do programa</li>
                <span style="font-weight: 400">
                    • Conhecer o aluno através de informações de sua família e
                    dos profissionais que lhe atendem; <br />
                    • Pesquisar as probabilidades no relativo às aprendizagens
                    escolares e sociais; <br />
                    • Descobrir os temas e elementos de seu interesse; <br />
                    • Planejar atividades que lhe proporcione aprendizagem,
                    interesse e prazer ao executá-la;<br />
                    • Utilizar formas alternativas de comunicação.
                </span>

                <li style="margin: 35px 0 5px">Metas:</li>
                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="5"
                    >
                        Matemática
                    </th>
                    <tr>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Metas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Período
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Desempenho Atual
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Estratégia e Intervenções Pedagógicas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Recursos
                        </th>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Desenvolver habilidade de resolução de
                                problemas</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Segundo semestre</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">
                                • Conta de 0 a 50 <br />
                                • Resolve continhas simples de adição e
                                subtração</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">
                                • Desenvolver sua capacidade de enteração com as
                                outras crianças; <br />
                                • Usar material concreto para compreender o que
                                deve ser feito; <br />
                                • Conversar sobre o enunciado para melhor
                                compreensão;</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Tablet, jogos didáticos, material dourado,
                                lápis de cor e atividades adaptadas;</span
                            >
                        </td>
                    </tr>
                </table>

                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="5"
                    >
                        Linguagens (Lingua Portuguesa, Lingua Inglesa, Arte,
                        Educ. Física)
                    </th>
                    <tr>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Metas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Período
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Desempenho Atual
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Estratégia e Intervenções Pedagógicas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Recursos
                        </th>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Desenvolver a habilidade de ler e escrever com
                                letra cursiva</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Segundo semestre</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Ler palavras, frases e pequenos textos na letra
                                bastão</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">
                                • Atendimento individual; <br />
                                • Produção oral e escrita; <br />
                                • Colagem, pintura; <br />
                                • Material adaptado;</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Textos diversos, Livros infantis, vídeos,
                                músicas relacionadas ao assunto trabalhado</span
                            >
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Participar dos jogos e brincadeiras</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">&nbsp</span>
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Demonstra pouco interesse e habilidades nas
                                atividades propostas</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">
                                • Atividades esportivas e brincadeiras
                                direcionadas durante a aula prática na quadra
                                <br />
                                • Utilizar material concreto <br />
                                • Propor brincadeiras que movimentem o corpo
                                melhorando a coordenação motora</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Vídeos, bola, corda, cabo de vassoura, raquete
                                do tênis, amarelinha, cartões com sílabas e
                                palavras.</span
                            >
                        </td>
                    </tr>
                </table>

                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="5"
                    >
                        Ciências da Natureza
                    </th>
                    <tr>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Metas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Período
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Desempenho Atual
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Estratégia e Intervenções Pedagógicas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Recursos
                        </th>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Adquirir noções fundamentais sobre a higiene e
                                adquirir o habito de cuidar de si.</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Segundo semestre</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Ler livros e gibi sobre o tema</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Confecção de cartazes sobre práticas e hábitos
                                saudáveis (escovar os dentes, higiene corporal,
                                cuidados com os alimentos; Cruzadinha da
                                higiene;</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Cartazes e Vídeos</span
                            >
                        </td>
                    </tr>
                </table>

                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="5"
                    >
                        Ciências Humanas (Humanas e Geografia)
                    </th>
                    <tr>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Metas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Período
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Desempenho Atual
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Estratégia e Intervenções Pedagógicas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Recursos
                        </th>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Reconhecer as formas de relevo através de
                                figuras ampliadas</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Segundo semestre</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Diferencia paisagem natural de paisagem
                                cultural</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Confecção de cartazes sobre o relevo</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Computador, cartazes</span
                            >
                        </td>
                    </tr>
                </table>

                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="5"
                    >
                        Ensino Religioso
                    </th>
                    <tr>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Metas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Período
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Desempenho Atual
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Estratégia e Intervenções Pedagógicas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Recursos
                        </th>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Melhorar a participação nas aulas</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Segundo semestre</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Realiza as atividades escritas elaboradas pela
                                professora</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">
                                • Confecção de cartazes; <br />
                                • Assistir filminhos de acordo com a assunto a
                                ser trabalhado <br />
                                • Atividades adaptadas; <br />
                                • Utilizar gravuras, trechos de livros e
                                revistas, quadrinhos;</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">
                                • Cartazes <br />
                                • TV <br />
                                • Lápis de cor, gravuras, pintura a dedo, tinta
                                guache, tesoura.</span
                            >
                        </td>
                    </tr>
                </table>

                <table
                    style="
                        border-collapse: collapse;
                        border: 1px solid black;
                        margin-top: 18px;
                        width: auto;
                    "
                >
                    <th
                        style="
                            background-color: rgba(209, 213, 219, 1);
                            padding: 8px;
                            text-align: center;
                        "
                        colspan="5"
                    >
                        Atividades vida diária
                    </th>
                    <tr>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Metas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Período
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Desempenho Atual
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Estratégia e Intervenções Pedagógicas
                        </th>
                        <th
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                                text-align: center;
                            "
                        >
                            Recursos
                        </th>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Pedir para ir (falar) ao banheiro;
                            </span>
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Até o final do ano letivo</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >De vez enquando é perguntado se o aluno deseja
                                ir ao banheiro;</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">&nbsp</span>
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">&nbsp</span>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Interagir socialmente com os colegas</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >Até o final do ano letivo</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400"
                                >As vezes responde algo quando algum colega lhe
                                dirige a palavra;</span
                            >
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">&nbsp</span>
                        </td>
                        <td
                            style="
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            "
                        >
                            <span style="font-weight: 400">&nbsp</span>
                        </td>
                    </tr>
                </table>

                <li style="margin: 35px 0 5px">Proposta de Intervenção:</li>
                <h4 style="line-height: 30px">
                    (<span> X </span>) Mediação individual nas atividades e
                    avaliações.<br />
                    (<span> X </span>) Trabalhar os conceitos/conteúdos no
                    concreto.<br />
                    (<span> X </span>) Proporcionar tempo estendido para
                    realização de atividades e avaliações.<br />
                    (<span> X </span>) Reduzir textos e enunciados para melhor
                    compreensão.<br />
                    (<span> X </span>) Questões objetivas.<br />
                    (<span> X </span>) Correção diferenciada nas avaliações.<br />
                    (<span> X </span>) Adaptação Curricular.<br />
                    (<span> </span>) Outro: <span></span>
                </h4>

                <li style="margin: 35px 0 5px">
                    Objetivo das adaptações curriculares:
                </li>
                <span style="font-weight: 400"
                    >Possibilitar a aprendizagem, a compreensão e apreensão dos
                    conteúdos, a socialização e inclusão de Gustavo, partindo de
                    seu conhecimento prévio.</span
                >
                <li style="margin: 35px 0 5px">
                    Ações adaptativas por cada área de conhecimento:
                </li>
                <span style="font-weight: 400"></span>
                <li style="margin: 35px 0 5px">
                    Recursos de tecnologia assistiva:
                </li>
                <span style="font-weight: 400"
                    >Computadores, tablets, jogos e brincadeiras lúdicas;
                </span>
                <li style="margin: 35px 0 5px">Recursos avaliativos:</li>
                <span style="font-weight: 400"
                    >Portfólio, Registros, trabalhos individuais e coletivos,
                    Provas, Desempenho nas atividades propostas</span
                >
                <li style="margin: 35px 0 5px">
                    Observações que considerar necessária:
                </li>
                <span style="font-weight: 400"></span>
                <li style="margin: 35px 0 5px">Parecer Semestral:</li>
                <span style="font-weight: 400"></span>
            </ol>

            <div>
                <hr style="margin-top: 80px" />

                <h1
                    style="
                        margin-top: 80px;
                        text-align: center;
                        font-weight: 600;
                        font-size: 18px;
                    "
                >
                    TERMO DE CIÊNCIA
                </h1>

                <div
                    style="
                        text-align: justify;
                        margin: 30px 10px 5px 10px;
                        line-height: 23px;
                    "
                >
                    <p>
                        É imprescindível a família acompanhar e promover o
                        desenvolvimento do (a) aluno (a) em suas áreas
                        cognitivas, emocionais e sociais, firmando assim
                        parceria com a escola.
                    </p>

                    <br />

                    <p>
                        Eu,
                        <span>___________________________________________</span
                        >, responsável pelo (a) aluno (a)
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

                <div
                    style="
                        text-align: center;
                        display: flex;
                        justify-content: space-between;
                        margin: 40px 80px 0 80px;
                    "
                >
                    <p>
                        <span>____________________________</span> <br />
                        Professor de AEE
                    </p>
                    <p>
                        <span style="margin-top: 140px"
                            >____________________________</span
                        >
                        <br />
                        Coordenadora Pedagógica
                    </p>
                </div>
            </div>
        </main>

        <footer>
            <div
                style="
                    display: grid;
                    width: 100vw;
                    place-items: center;
                    text-align: center;
                    font-size: 12px;
                    margin: 130px 0 10px 0;
                "
            >
                <img
                    style="width: 130px"
                    src="../assets/logoprefeiturabalsas.svg"
                    alt="Logo da Prefeitura de Balsas"
                />
                <h5>
                    SECRETARIA MUNICIPAL DE EDUCAÇÃO <br />
                    DEPARTAMENTO DE EDUCAÇÃO ESPECIAL
                </h5>
            </div>
        </footer>
    </body>
</html>
