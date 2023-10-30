<?php
include('../banco/protect.php');
include('../banco/getStatus.php')
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Seja seguro na Web</title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../estilo/style.css">
    <style>

    </style>
</head>

<body>

    <header>

        <h1>Combater Cyberbullying, Pedofilia e outros Riscos Online com
            Crianças e Adolescentes</h1>

        <p>O objetivo deste projeto é capacitar crianças e adolescentes de escolas públicas em reconhecer, evitar e
            combater os riscos online</p>

    </header>

    <div class="menu-toggle">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

    <nav>
        <a href="../banco/logout.php" style=" color: rgb(183, 247, 247)">Sair</a>
        <a href="painel.php" rel="prev">Home</a>
        <a href="cyberbullyingBD.php" rel="next">O que é Cyberbullying?</a>
        <a href="pedofiliaBD.php" rel="next">O que é Pedofilia?</a>
        <a href="riscosBD.php" rel="next">Outros Riscos</a>
        <a href="jogoBD.php" rel="next">Jogos On-line</a>
        <a href="gamesBD.php" rel="prev">Passatempos</a>
        <a href="avaliacaoBD.php" rel="prev">Avaliações</a>
        <a href="certificadorBD.php" rel="prev">Certificados</a>
    </nav>

    <main>

        <h1>Avaliações dos tópicos lidos</h1>
        <p class="textoArrumado">Certificamos que <strong>
                <?php echo $usuarios['nome']; ?>
            </strong> concluiu com êxito o curso/treinamento sobre os tópicos
            listados abaixo. O desempenho do(a) aluno(a) foi avaliado com base em seu conhecimento e compreensão dos
            assuntos abordados.</p>
        <h2>Topicos</h2>
        <br>

        <!--mexe-->
        <section class="topicos">

            <div class="topico">
                <img src="../imagens/risco-foto-1.jpg" alt="Cyberbullying" class="pequena" />
                <div class="topico-info">
                    <p><strong>O que é Cyberbullying?</strong></p>
                    <button class="meu-botao"
                        onclick="window.location.href='../paginasQuizz/quizzCyberbullying.php'">Continuar</button>
                </div>
                <div class="AprovadoReprovado">
                    <strong>
                        <p>Situação:
                            <?php echo $usuarios['status_cyberbullying']; ?>
                        </p>
                    </strong>
                </div>
            </div>

            <div class="topico">
                <img src="../imagens/risco-foto-1.jpg" alt="Pedofilia" class="pequena" />
                <div class="topico-info">
                    <p><strong>O que é Pedofilia?</strong></p>
                    <button class="meu-botao"
                        onclick="window.location.href='../paginasQuizz/quizzPedofilia.php'">Continuar</button>
                </div>
                <div class="AprovadoReprovado">
                    <strong>
                        <p>Situação:
                            <?php echo $usuarios['status_pedofilia']; ?>
                        </p>
                    </strong>
                </div>
            </div>

        </section>

        <section class="topicos">

            <div class="topico">
                <img src="../imagens/risco-foto-1.jpg" alt="jogos" class="pequena" />
                <div class="topico-info">
                    <p><strong>Jogos On-line</strong></p>
                    <button class="meu-botao"
                        onclick="window.location.href='../paginasQuizz/quizzJogos.php'">Continuar</button>
                </div>
                <div class="AprovadoReprovado">
                    <strong>
                        <p>Situação:
                            <?php echo $usuarios['status_jogos']; ?>
                        </p>
                    </strong>
                </div>
            </div>

            <div class="topico">
                <img src="../imagens/risco-foto-1.jpg" alt="ricos" class="pequena" />
                <div class="topico-info">
                    <p><strong>Outros Riscos</strong></p>
                    <button class="meu-botao"
                        onclick="window.location.href='../paginasQuizz/quizzRiscos.php'">Continuar</button>
                </div>
                <div class="AprovadoReprovado">
                    <strong>
                        <p>Situação:
                            <?php echo $usuarios['status_riscos']; ?>
                        </p>
                    </strong>
                </div>
            </div>

        </section>
        <!--mexe-->

        <p class="textoArrumado">O aluno obteve a pontuação necessária para a conclusão bem-sucedida deste
            curso/treinamento e, portanto, é concedido o presente Certificado de Conclusão.</p>

    </main>

    <footer>
        <p>Site criado por <a href="#">Erick Piero</a> para o <a href="#">Unisuam</a></p>

    </footer>
    <script src="../js/menu.js"></script>
</body>

</html>