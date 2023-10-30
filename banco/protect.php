<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: ../paginasBanco/login.php");
    /* die("Você não pode acessar esta página porque não está logado.<p><a href=\"../paginas/login.php\">Entrar</a></p>");*/
}

?>