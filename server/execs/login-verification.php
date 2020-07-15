<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: ../../pages/internal-system/login.php');
	exit();
}

?>