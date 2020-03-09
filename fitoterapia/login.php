<?php
session_start();

if (isset($_POST['usuario']) && empty($_POST['usuario']) == false){
	$usuario = addslashes($_POST['usuario']);
	$senha = md5(addslashes($_POST['senha']));

	$dsn = "mysql:dbname=login;host=127.0.0.1";
	$dbuser = "dayvison";
	$dbpass = "97269438";

	try{
		$db = new PDO($dsn, $dbuser, $dbpass);

		$sql = $db->query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'");

		if($sql->rowCount() > 0){

			$dado = $sql->fetch();

			$_SESSION['idusuario'] = $dado['idusuario'];

			header("Location: painel.php");

		}
	} catch(PDOException $e) {
		echo "Falhou: ".$e->getMessage();
	}

}


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Login</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="area_login">
				<div class="login">
					<div class="perfil">
						<div class="perfil_int">
							<img width="100px" height="100px"/>
						</div>
					</div>
					<form action="login.php" method="POST">
					<input type="text" name="usuario" placeholder="Usuário">
					<input type="password" name="senha" placeholder="Senha">
					<div class="bt_login"><button type="submit">Login</button></div>
					</form>
					<div class="info_user">
						<div><a href="">Esqueci a senha</a></div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>
