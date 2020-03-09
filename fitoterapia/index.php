<?php
session_start();

if(isset($_SESSION['idusuario']) && empty($_SESSION['idusuario']) == false){
	echo "Área restrita...";
}else{
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Página Inicial</title>
	</head>
	<body>
		<button type="button" name="button"><a href="login.php">Logar no sistema</a></button>
	</body>
</html>
