<?php
require("../../server/connect.php");

if(!isset($_GET["ship"])) {
	header('Location: ship-manage.php');
	exit();
} else {
	$idNave = $_GET["ship"];

	$dados = mysql_query('SELECT * FROM nave WHERE idNave = ' . $idNave, $con) or die(mysql_error());
	$row = mysql_fetch_assoc($dados);
	$total = mysql_num_rows($dados);
}
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../../../css/bulma.min.0.9.css">
	<link rel="stylesheet" href="../../../css/form.css">

	<title>Edição de Nave - Sistema Interno</title>

	<!-- Passando dados para o JS -->
	<script>
		var nave = {
			nome: "<?=$row['nome']?>",
			universo: "<?=$row['universo']?>",
			descricao: "<?=$row['descricao']?>",
			capacidade: "<?=$row['capacidade']?>",
			valor: "<?=$row['valor']?>"
		}
	</script>
</head>
<body>
	<div class="container">
		<form method="post" action="../../../server/execs/ship-edit-exec.php" enctype="multipart/form-data" autocomplete="off">
			<div class="control">
				<label>Nome</label>
				<input name="nome" id="nome" type="text" class="input is-info">
			</div>
			<div class="control">
				<label>Universo</label>
				<input name="universo" id="universo" type="text" class="input is-info">
			</div>
			<div class="control">
				<label>Capacidade</label>
				<input name="capacidade" id="capacidade" type="number" class="input is-info">
			</div>
			<div class="control">
				<label>Descrição</label>
				<input name="descricao" id="descricao" type="text" class="input is-info">
			</div>
			<div class="control">
				<label>Valor</label>
				<input name="valor" id="valor" type="text" class="input is-info dinheiro">
			</div>
			<input type="hidden" name="id" value="<?=$row['idNave']?>" />

			<button type="submit" class="button is-link">Salvar alterações!</button>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!-- Mascara de Valor -->
	<script src="../../../js/mask-number-min.js"></script>
	<script>
    	$('.dinheiro').mask('#.##0,00', { reverse: true });
	</script>
	
	<script src="../../../js/edit-script.js"></script>
</div>
</body>
</html>