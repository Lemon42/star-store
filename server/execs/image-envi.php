<?php

function enviaImagem($nome, $arquivo_tmp){
	$extensao = pathinfo($nome, PATHINFO_EXTENSION);
	$extensao = strtolower($extensao);

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

	// Enviando as informações para o servidor
	mysql_query($queryDados, $con);
	$ultimoId = mysql_insert_id();

	$queryImg = " INSERT INTO `imagem` (`nome`, `idNave`)
				VALUES ('$novoNome', '$ultimoId')
	";
	mysql_query($queryImg, $con);
}

?>