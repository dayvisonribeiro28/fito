<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link rel="stylesheet" type="text/css" href="css/cadastro.css">
	<title>Cadastro de itens</title>
</head>
<body>
	<div class="container">
		<div class="menu">
			<ul>
				<li><a href="painel.php">Painel</a></li>
				<li><a href="cadastro.php">Cadastro</a></li>
				<li><a href="pesquisa.php">Pesquisa</a></li>
			</ul>
		</div>
		<div class="cadastro_area">
			<form action="cadastro_script.php" method="POST">
			<div class="cadastro">
				<div class="cad_nome cad">
					<div class="nome_planta">Digite o nome da Planta</div>
					<div class="input"><textarea type="text" name="nome" placeholder="Digite Aqui"></textarea></div>
				</div>
				<div class="cad_descricao cad">
					<div class="descricao">Digite a descrição da Planta</div>
					<div class="input"><textarea type="text" name="descricao" placeholder="Digite Aqui"></textarea></div>
				</div>
			</div>
			<div class="enviar"><input type="submit" value="Enviar"></div>
			</form>
			<?php
				if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset(	$_SESSION['msg']);
				}
			?>
		</div>
	</div>
</body>
</html>
