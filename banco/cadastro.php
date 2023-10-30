<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifique se o e-mail já existe no banco de dados
    $verificaEmail = "SELECT * FROM usuarios WHERE email='$email'";
    $resultado = mysqli_query($conexao, $verificaEmail);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<script> alert("Este e-mail já está em uso. Por favor, escolha outro e-mail."); window.location.href = "../paginasBanco/cadastro.php"; </script>';
    } else {

        /*$sql = "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', '$senha')";*/
        
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

        /* $sql = "INSERT INTO usuarios(nome, email, senha, status_cyberbullying, status_pedofilia, status_jogos, status_riscos) VALUES ('$nome', '$email', '$senha', 'Não realizado', 'Não realizado', 'Não realizado', 'Não realizado')";*/

        $sql = "INSERT INTO usuarios(nome, email, senha, status_cyberbullying, status_pedofilia, status_jogos, status_riscos) VALUES ('$nome', '$email', '$senhaHash', 'Não realizado', 'Não realizado', 'Não realizado', 'Não realizado')";

        if (mysqli_query($conexao, $sql)) {
            /*echo "Usuário cadastrado com sucesso";*/
            header("Location: ../paginasBanco/login.php");
        } else {
            echo "Erro" . mysqli_error($conexao);
        }
    }

    mysqli_close($conexao);
}
?>