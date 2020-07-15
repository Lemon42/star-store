<nav class="navbar" role="navigation" aria-label="main navigation" style="background-color: #3273dc; margin-bottom: 30px;">
	<div class="navbar-brand">
		<a class="navbar-item" href="#">
			<img src="../../images/logo.png" width="112" height="28">
		</a>

		<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
			data-target="navbarBasicExample">
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</a>
	</div>

	<div id="navbarBasicExample" class="navbar-menu">
		<div class="navbar-start">
			<a href="../../index.php" class="navbar-item">
				Loja
			</a>
			<a href="ship-registration.php" class="navbar-item">
				Cadastro
			</a>
			<a href="ship-edit.php" class="navbar-item">
				Gerenciamento
			</a>
		</div>

		<div class="navbar-end">
			<div class="navbar-item">
				<i class="fas fa-user" style="margin-right: 5px"></i>
				<?php echo $_SESSION['usuario_nome'];?>
			</div>
			<a class="navbar-item" style="color: #F03A5F;" href="../../server/execs/logout.php">
				<strong>Sair</strong>
				<i class="fas fa-sign-out-alt" style="margin-left: 5px"></i>
			</a>
		</div>
	</div>
</nav>