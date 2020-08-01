<html>
<head>
	<meta charset="utf-8">
	<title>Enviando requisição</title>
</head>
<body><h1>Aguarde um momento</h1></body>
<?php
	require('../connect.php');
	require('login-verification.php');

	$idImagem = $_POST['idImagem'];
	$idNave = $_POST['id'];

	$arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
	$nome = $_FILES[ 'imagem' ][ 'name' ];

	$extensao = pathinfo($nome, PATHINFO_EXTENSION);
	$extensao = strtolower($extensao);

	// Verificando tentativa de invasão pela imagem
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

	// Deletando 
	$dados = mysql_query('SELECT * FROM imagem WHERE idImagem = ' . $idImagem, $con) or die(mysql_error());
	$row = mysql_fetch_assoc($dados);
	unlink('../../images/ships/'.$row['nome']);

	// Enviando para o servidor
	$novoNome = uniqid(time()) . '.' . $extensao;
	$destino = '../../images/ships/' . $novoNome;

	move_uploaded_file($arquivo_tmp, $destino);
	
	// Enviando as informações para o servidor
	$queryImg = " UPDATE `imagem` SET nome = '$novoNome' WHERE idImagem = $idImagem";
	mysql_query($queryImg, $con);

	header('Location: ../../pages/internal-system/ship-edit.php?ship='.$idNave);
	exit();
?>
</html>