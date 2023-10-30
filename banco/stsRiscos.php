<?php
include("conexao.php");
header("Access-Control-Allow-Headers: Content-type");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");

echo json_encode($_POST);

// Verificar se o usuário está logado
// Usuário logado

echo $_SERVER["REQUEST_METHOD"];

/*echo 'esta qui';*/
$status_riscos = $_POST['status_riscos'];
$id = $_POST['id'];

$userSql = "SELECT * from usuarios where id = $id";
$results = $conexao->query($userSql) or die("Falha na execução do código SQL: " . $conexao->error);

$results = $results->fetch_assoc(); // Corrigido para usar $results
if ($results['status_riscos'] !== 'aprovado') {
    $sql = "update usuarios set status_riscos = '$status_riscos' where id = $id";
    $stmt = $conexao->query($sql) or die("Falha na execução do código SQL: " . $conexao->error);
}

mysqli_close($conexao);
?>