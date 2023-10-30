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

        <h1>Certificado de conclusão do curso</h1>
        <p class="textoArrumado">Imagine que quando você termina de aprender algo novo, como um jogo ou uma lição na escola, você ganha um papel especial chamado "certificado". Esse certificado é como um prêmio que mostra para todos que você fez um bom trabalho e aprendeu tudo o que era preciso.</p>

        <h2>Certificado: O que é Cyberbullying?</h2>
        <br>

        <?php
        $cyberbullying = $usuarios['status_cyberbullying'];
        if ($cyberbullying == 'aprovado') {
            echo "Parabéns! Você está aprovado para baixar o certificado.";
            ?>
            <form method="post" action="../certificados/geradorCertificado.php">
                <input type="hidden" value="<?php echo $_SESSION['nome']; ?>" id="sessacao" name="nome">
                <input type="hidden" value="Seja seguro na Web / Certificado: O que é Cyberbullying?" id="sessacao"
                    name="curso">
                <input type="hidden" value="<?php $hoje = date('d/m/Y');
                echo $hoje; ?>" id="sessacao" name="data">
                <button style="margin-top: 20px; margin-bottom: 20px;" type="submit">Baixar</button>
            </form>
            <?php
        } else {
            echo "Você não está aprovado para baixar o certificado.";
        }
        ?>
        <p></p>

        <h2>Certificado: Jogos On-line</h2>
        <br>

        <?php
        $jogos = $usuarios['status_jogos'];
        if ($jogos == 'aprovado') {
            echo "Parabéns! Você está aprovado para baixar o certificado.";
            ?>
            <form method="post" action="../certificados/geradorCertificado.php">
                <input type="hidden" value="<?php echo $_SESSION['nome']; ?>" id="sessacao" name="nome">
                <input type="hidden" value="Seja seguro na Web / Certificado: Jogos On-line" id="sessacao" name="curso">
                <input type="hidden" value="<?php $hoje = date('d/m/Y');
                echo $hoje; ?>" id="sessacao" name="data">
                <button style="margin-top: 20px; margin-bottom: 20px;" type="submit">Baixar</button>
            </form>
            <?php
        } else {
            echo "Você não está aprovado para baixar o certificado.";
        }
        ?>
        <p></p>

        <h2>Certificado: O que é Pedofilia?</h2>
        <br>

        <?php
        $pedofilia = $usuarios['status_pedofilia'];
        if ($pedofilia == 'aprovado') {
            echo "Parabéns! Você está aprovado para baixar o certificado.";
            ?>
            <form method="post" action="../certificados/geradorCertificado.php">
                <input type="hidden" value="<?php echo $_SESSION['nome']; ?>" id="sessacao" name="nome">
                <input type="hidden" value="Seja seguro na Web / Certificado: O que é Pedofilia?" id="sessacao"
                    name="curso">
                <input type="hidden" value="<?php $hoje = date('d/m/Y');
                echo $hoje; ?>" id="sessacao" name="data">
                <button style="margin-top: 20px; margin-bottom: 20px;" type="submit">Baixar</button>
            </form>
            <?php
        } else {
            echo "Você não está aprovado para baixar o certificado.";
        }
        ?>
        <p></p>

        <h2>Certificado: Outros Riscos</h2>
        <br>

        <?php
        $riscos = $usuarios['status_riscos'];
        if ($riscos == 'aprovado') {
            echo "Parabéns! Você está aprovado para baixar o certificado.";
            ?>
            <form method="post" action="../certificados/geradorCertificado.php">
                <input type="hidden" value="<?php echo $_SESSION['nome']; ?>" id="sessacao" name="nome">
                <input type="hidden" value="Seja seguro na Web / Certificado: Outros Riscos" id="sessacao" name="curso">
                <input type="hidden" value="<?php $hoje = date('d/m/Y');
                echo $hoje; ?>" id="sessacao" name="data">
                <button style="margin-top: 20px; margin-bottom: 20px;" type="submit">Baixar</button>
            </form>
            <?php
        } else {
            echo "Você não está aprovado para baixar o certificado.";
        }
        ?>
        <p></p>
        
    </main>

    <footer>
        <p>Site criado por <a href="#">Erick Piero</a> para o <a href="#">Unisuam</a></p>
    </footer>

    <script src="../js/menu.js"></script>
</body>

</html>