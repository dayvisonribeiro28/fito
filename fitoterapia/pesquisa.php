<?php

define('HOST', 'localhost');
define('USUARIO', 'dayvison');
define('SENHA', '97269438');
define('DB', 'cadastro');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar');
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device=width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="stylesheet" href="css/pesquisa2.css">
	<title>Pesquisa</title>
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
		<div class="pesquisa_area">
			<div class="pesquisa_int">
				<form action="" method="POST" name="form_busca">
					<div class="pesquisa"><input type="text" name="pesquisa" placeholder="Pesquise Aqui"></div>
					<div class="botao"><input type="submit" name="botao" value="Pesquisar"></div>
				</form>
			</div>
		</div>
		<div class="resultado_area">
				<?php
					if (isset($_POST['botao'])) {
						$botao = $_POST['pesquisa'];

						$pesquisa_dividida = explode(' ', $botao);
						$cont_palavra = count($pesquisa_dividida);

						for ($i=0;$i<$cont_palavra;$i++){
							$pesquisa_palavra = $pesquisa_dividida[$i];

							$resultado_bd = "SELECT * FROM itens WHERE nome LIKE '%$pesquisa_palavra%' or descricao LIKE '%$pesquisa_palavra%'";
							$resultado_final = mysqli_query($conexao, $resultado_bd);
							while ($linha = mysqli_fetch_array($resultado_final)) {
									$nome = $linha['nome'];
									$descricao = $linha['descricao'];
									echo "
									<div class='resultado'>
										<h2 style = 'color:#fff;'>".$nome."</h2>
										<p style = 'padding-top:15px;text-align:justify;'>".$descricao."</p>
									</div>";
							}
						}
					}
				?>
		</div>
	</div>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
