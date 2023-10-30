<?php
include("conexao.php");

if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (empty($_POST['email'])) {
        echo "Preencha seu e-mail";
    } elseif (empty($_POST['senha'])) {
        echo "Preencha sua senha";
    } else {
        $email = $_POST['email'];
        $senha_inserida = $_POST['senha'];

        $stmt = $conexao->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();

            if (password_verify($senha_inserida, $usuario['senha'])) {
                session_start();
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: ../paginasBanco/painel.php");
            } else {
                echo '<script> alert("Falha ao logar! E-mail ou senha incorretos"); window.location.href = "../paginasBanco/login.php"; </script>';
            }
        } else {
            echo '<script> alert("Falha ao logar! E-mail ou senha incorretos"); window.location.href = "../paginasBanco/login.php"; </script>';
        }
    }
}
?>