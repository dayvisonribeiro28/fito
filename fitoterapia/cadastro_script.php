<?php

session_start();

$servidor = "127.0.0.1";
$usuario = "dayvison";
$senha = "97269438";
$dbname = "cadastro";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

//echo "Nome da Planta: $nome_item <br>";
//echo "Descrição da Planta: $descricao <br>";

$inserir_bd = "INSERT INTO itens (nome, descricao) VALUES ('$nome', '$descricao')";

$resultado = mysqli_query($conn, $inserir_bd);

if (mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style = 'color:white;'>Cadastrado com sucesso</p>";
	header("Location: cadastro.php");
}else{
	header("Location: cadastro.php");
}
?>
