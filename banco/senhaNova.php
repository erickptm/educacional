<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_email = $_POST['username_email'];
    $nova_senha = $_POST['nova_senha'];

    // Verifique se o nome de usuário ou e-mail existe no banco de dados
    $verificaUsuarioEmail = "SELECT * FROM usuarios WHERE nome='$username_email' OR email='$username_email'";
    $resultado = mysqli_query($conexao, $verificaUsuarioEmail);

    if (mysqli_num_rows($resultado) > 0) {
        // Atualize a senha para o novo valor
        $row = mysqli_fetch_assoc($resultado);
        $idUsuario = $row['id'];

        $hashSenha = password_hash($nova_senha, PASSWORD_DEFAULT);

        $atualizarSenha = "UPDATE usuarios SET senha='$hashSenha' WHERE id='$idUsuario'";
        if (mysqli_query($conexao, $atualizarSenha)) {
            echo '<script> alert("Senha redefinida com sucesso."); window.location.href = "../paginasBanco/login.php"; </script>';
        } else {
            echo "Erro ao redefinir a senha: " . mysqli_error($conexao);
        }
    } else {
        echo '<script> alert("Nome de usuário ou e-mail não encontrado. Por favor, verifique as informações inseridas."); window.location.href = "../paginasBanco/novaSenhaBD.php"; </script>';
    }
}
?>