<?php
require("../../server/connect.php");

$dados = mysql_query('SELECT * FROM nave', $con) or die(mysql_error());
$row = mysql_fetch_assoc($dados);
$total = mysql_num_rows($dados);

?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../../css/bulma.min.0.9.css">
	<link rel="stylesheet" href="../../css/form.css">

	<title>Gestão de Naves - Sistema Interno</title>
</head>
<body>
	<?php include('../../model/navbar-internal-system.html');?>
	<div class="container">
		<center>
			<table class="table">
				<thead>
					<tr>
						<th><strong style="font-size: 19px;">#</strong></th>
						<th>Imagem</th>
						<th>Nome</th>
						<th>Universo</th>
						<th>Capacidade</th>
						<th>Valor</th>
						<th><strong>MODIFICAR</strong></th>
						<th><strong>DELETAR</strong></th>
					</tr>
				</thead>
				<tbody class="is-size-5">
					<?php 
					if($total > 0) {
						do {
					?>
					<tr>
						<th><?=$row['idNave']?></th>
						<?php
						$id = $row['idNave'];
						$imagemDados = mysql_query('SELECT * FROM imagem WHERE idNave = ' . $id, $con) or die(mysql_error());
						$img = mysql_fetch_assoc($imagemDados)
						?>
						<td><img class="form-img" src="../../images/ships/<?=$img['nome']?>"></td>
						<td><?=$row['nome']?></td>
						<td><?=$row['universo']?></td>
						<td><?=$row['capacidade']?></td>
						<td><?=$row['valor']?></td>
						<td><button class="button is-warning"
								onclick="window.location.href='ship-edit.php?ship=<?=$row['idNave']?>'"><i
									class="fas fa-cogs" style="color: #fff;"></i></button>
						</td>
						<td><button class="button is-danger"><i class="fas fa-trash-alt"
									style="color: #fff;"></i></button></td>
					</tr>
					<?php
						}while($row = mysql_fetch_assoc($dados));
					}
					?>
				</tbody>
			</table>
		</center>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous"></script>
</body>
</html>