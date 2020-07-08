<html>
<head>
	<meta charset="utf-8">
	<title>Enviando requisição</title>
</head>
<body><h1>Aguarde um momento</h1></body>
<?php
	require('../connect.php');

	$nome = mysql_real_escape_string($_POST['nome']);
	$universo = mysql_real_escape_string($_POST['universo']);
	$capacidade = mysql_real_escape_string($_POST['capacidade']);
	$descricao = mysql_real_escape_string($_POST['descricao']);

	$query = " INSERT INTO `nave` (`nome`, `universo`, `capacidade`, `descricao`)
			   VALUES ('$nome', '$universo', '$capacidade', '$descricao')
	";
	mysql_query($query, $con);

	// ************
	// ** Imagem **
	// ************

	$ultimoId = mysql_insert_id();

	$arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
	$nome = $_FILES[ 'imagem' ][ 'name' ];

	$extensao = pathinfo($nome, PATHINFO_EXTENSION);
	$extensao = strtolower($extensao);

	// Verificando tentaiva de invasão pela imagem
	$permitido = False;
	$extensaoPermitida = array('png', 'jpg', 'jpeg', 'gif');

	for ($i = 0; $i < count($extensaoPermitida); $i++){
		if ($extensao == $extensaoPermitida[$i]){
			$permitido = True;
		}
	}

	if(!$permitido){
		header('Location: ../../pages/internal-system/ship-registration.php');
		exit();
	}

	// Enviando para o servidor
	$novoNome = uniqid(time()) . '.' . $extensao;
	$destino = '../../images/ships/' . $novoNome;

	move_uploaded_file($arquivo_tmp, $destino);

	// Gravando imagem no bd
	$query = " INSERT INTO `imagem` (`nome`, `idNave`)
			   VALUES ('$novoNome', '$ultimoId')
	";
	mysql_query($query, $con);

	header('Location: ../../pages/internal-system/ship-registration.php');
	exit();

?>
</html>