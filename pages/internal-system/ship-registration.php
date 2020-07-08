<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../../../css/bulma.min.0.9.css">
	<link rel="stylesheet" href="../../../css/form.css">

	<title>Cadastro de Naves - Sistema Interno</title>
</head>
<body>
	<div class="container">
		<form method="post" action="../../../server/execs/ship-registration-exec.php" enctype="multipart/form-data">
			<div class="control">
				<input name="nome" type="text" placeholder="Nome da nave" class="input is-info" required>
			</div>
			<div class="control">
				<input name="universo" type="text" placeholder="Universo (filme/série de origem)" class="input is-info" required>
			</div>
			<div class="control">
				<input name="capacidade" type="number" placeholder="Capacidade de pessoas a bordo" class="input is-info" required>
			</div>
			<div class="control">
				<input name="descricao" type="text" placeholder="Descrição técnica" class="input is-info" required>
			</div>

			<div class="control">
				<input type="file" name="imagem" accept="image/png, image/jpeg" required>
			</div>


			<button type="submit" class="button is-link">Cadastrar</button>
		</form>
	</div>
</div>
</body>
</html>