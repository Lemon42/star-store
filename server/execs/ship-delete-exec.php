<html>
<head>
	<meta charset="utf-8">
	<title>Enviando requisição</title>
</head>
<body><h1>Aguarde um momento</h1></body>
<?php
	require('../connect.php');

	$id = mysql_real_escape_string($_GET['id']);

	// Deletando imagem do servidor
	$dados = mysql_query('SELECT * FROM imagem WHERE idNave = ' . $id, $con);
	$row = mysql_fetch_assoc($dados);
	unlink('../../images/ships/'.$row['nome']);

	// Deletando nave do bd 
	mysql_query('DELETE FROM nave WHERE idNave = ' . $id, $con);
	mysql_query('DELETE FROM imagem WHERE idNave = ' . $id, $con);


	header('Location: ../../pages/internal-system/ship-manage.php');
	exit();
?>
</html>