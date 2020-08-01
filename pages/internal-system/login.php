<?php 
	session_start();
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../../css/bulma.min.0.9.css">
	<link rel="stylesheet" href="../../css/login.css">

	<title>Login - Sistema Administrador</title>
	<link rel="shortcut icon" href="../../images/favicon-manage.png" type="image/x-icon" />
</head>
<body>
	<div class="painel">
		<div class="painel-content">
			<h1 class="title is-4">Sistema de Login</h1>
			<?php
			if(isset($_SESSION['nao_autenticado'])){
			?>
			<div class="error">
				<i class="fas fa-exclamation-triangle error-title"></i>
				<h1 class="error-title">Erro ao tentar efetuar o login!</h1>
			</div>
			<?php
			}
			unset($_SESSION['nao_autenticado']);
			?>
			<form method="post" action="../../../server/execs/login-admin-exec.php" autocomplete="off">
				<div class="control">
					<label class="label"><i class="fas fa-user"></i> User</label>
					<input name="user" type="text" placeholder="Digite o usuário" class="input is-info is-rounded is-medium" required>
				</div>
				<div class="control">
					<label class="label"><i class="fas fa-lock"></i> Senha</label>
					<label class="label"></label>
					<input name="senha" type="password" placeholder="Digite a senha" class="input is-info is-rounded is-medium" required>
				</div>
	
				<button type="submit" class="button is-outlined is-rounded is-large is-fullwidth is-link">Entrar</button>
			</form>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous"></script>
</body>
</html>