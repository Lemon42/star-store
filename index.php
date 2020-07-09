<?php 
	require('server/connect.php');

	$dados = mysql_query('SELECT * FROM nave', $con) or die(mysql_error());
	$row = mysql_fetch_assoc($dados);
	$total = mysql_num_rows($dados);
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bulma.min.0.9.css">
	<link rel="stylesheet" href="css/style.css">

	<title>Hello, world!</title>
</head>
<body>
	<!--<div class="painel">
		<h1 class="title is-1">Bem-vindo a Star Store!</h1>
		<h2 class="subtitle is-2">O Universo precisa ser explorado, sua viagem começa aqui</h2>
	</div>-->

	<div class="container">
		<div class="columns is-multiline">
			<?php 
			if($total > 0) {
				do {

			?>
			<div class="column is-one-third">
				<div class="card">
					<div class="card-image">
						<figure class="image is-4by3">
							<?php
							$id = $row['idNave'];
							$imagemDados = mysql_query('SELECT * FROM imagem WHERE idNave = ' . $id, $con) or die(mysql_error());
							$img = mysql_fetch_assoc($imagemDados)
							?>
							<img src="images/ships/<?=$img['nome']?>">
						</figure>
					</div>
					<div class="card-content">
						<div class="content">
							<h1 class="title"><?=$row['nome']?></h1>
							<h2 class="subtitle"><?=$row['universo']?></h2>
							<?=$row['descricao']?>
							<br><br>
							<label>Capacidade: <strong><?=$row['capacidade']?></strong></label><br>
							<label>Valor: <strong><?=$row['valor']?></strong></label>
						</div>
					</div>
				</div>
			</div>
			<?php
					}while($row = mysql_fetch_assoc($dados));
			}
			?>
		</div>
	</div>
</body>
</html>