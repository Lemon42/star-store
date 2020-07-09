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
				<input name="valor" type="text" placeholder="Valor da nave" class="input is-info dinheiro" required>
			</div>

			<div class="control">
				<input type="file" name="imagem" accept="image/png, image/jpeg, image/gif" required>
			</div>


			<button type="submit" class="button is-link">Cadastrar</button>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!-- Mascara de Valor -->
	<script src="../../../js/mask-number-min.js"></script>
	<script>
    	$('.dinheiro').mask('#.##0,00', { reverse: true });
    </script>
</div>
</body>
</html>