<?php
session_start();
require('../connect.php');
 
if(empty($_POST['user']) || empty($_POST['senha'])) {
	header('Location: ../../pages/internal-system/login.php');
	exit();
}
 
$usuario = mysql_real_escape_string($_POST['user']);
$senha = mysql_real_escape_string($_POST['senha']);
$query = "select user from administrador where user = '{$usuario}' and senha = md5('{$senha}')";
 
$result = mysql_query($query, $con);
$row = mysql_num_rows($result);
 
if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: ../../pages/internal-system/ship-manage.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../../pages/internal-system/login.php');
	exit();
}
?>