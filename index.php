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
	<link rel="stylesheet" href="css/default.css">

	<title>Star Store - Home</title>
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
</head>

<body>
	<div class="painel">
		<div class="painel-content">
			<h1 class="title is-1" style="color: #161718">Bem-vindo a Star Store</h1>
			<h2 class="subtitle is-2" style="color: #161718">O Universo precisa ser explorado, sua viagem começa aqui!</h2>
		</div>
	</div>

	<?php include('model/navbar.html'); ?>

	<div class="container" style="margin-top: 30px;">
		<div class="columns is-multiline">
			<?php 
			if($total > 0) {
				do {
			?>
			<div class="column is-one-third">
				<div class="card large">
					<div class="card-image is-16by9">
						<figure class="image">
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
							<div class="title"><?=$row['nome']?></div>
							<div class="subtitle"><?=$row['universo']?></div>
							<div class="description"><?=$row['descricao']?>.</div><br>
							<div class="capacidade">Capacidade: <strong><?=$row['capacidade']?></strong></div>
							<div class="value">Valor: R$ <strong><?=$row['valor']?></strong></div>
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

	<?php include('model/footer.html'); ?>
</body>
</html>