<?php
include("conexao.php");

$id = $_SESSION['id'];

$sql_code = "SELECT * FROM usuarios WHERE id = $id";
$sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

$quantidade = $sql_query->num_rows;

$usuarios = $sql_query->fetch_assoc();

?>