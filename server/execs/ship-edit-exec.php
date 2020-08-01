<html>
<head>
	<meta charset="utf-8">
	<title>Enviando requisição</title>
</head>
<body><h1>Aguarde um momento</h1></body>
<?php
	require('../connect.php');
	require('login-verification.php');

	$nome = mysql_real_escape_string($_POST['nome']);
	$universo = mysql_real_escape_string($_POST['universo']);
	$capacidade = mysql_real_escape_string($_POST['capacidade']);
	$descricao = mysql_real_escape_string($_POST['descricao']);
	$valor = mysql_real_escape_string($_POST['valor']);
	$id = mysql_real_escape_string($_POST['id']);

	$query = " UPDATE `nave` 
			   SET nome = '$nome', universo = '$universo', capacidade = '$capacidade', 
			   descricao ='$descricao', valor = '$valor'
			   WHERE idNave = '$id'
	";
	mysql_query($query, $con);

	header('Location: ../../pages/internal-system/ship-edit.php?ship='.$id);
	exit();

?>
</html>