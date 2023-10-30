<?php
include('../banco/senhaNova.php');
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
        <a href="../index.php" rel="prev">Home</a>
    </nav>
    <main style="padding: 50px; margin-bottom: 0px;">

        <div class="login">
            <div>
                <img src="../imagens/LogoVAV.png" alt="LogoVAV" class="pequena" style="border-radius: 10px;">
            </div>

            <form action="../banco/senhaNova.php" method="POST">
                <div class="dados">

                    <input type="email" name="username_email" placeholder="Digite seu E-mail" required>
                    <input type="password" name="nova_senha" placeholder="Digite sua nova Senha" required>
                    <input type="submit" value="Redefinir Senha">

                </div>
            </form>
            <p>Voltando para tela de<a href="login.php" style="background-color:  #83e1ad;">Login</a></p>
        </div>

    </main>
    <footer>
        <p>Site criado por <a href="#">Erick Piero</a> para o <a href="#">Unisuam</a></p>

    </footer>
    <script src="../js/menu.js"></script>
</body>

</html>