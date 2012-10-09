<?php include_once "functions.php"; ?>
<?php valida_campos(); ?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Geral -->
		<title>Agenda Telefônica</title>
		<meta charset="utf-8" />
		<!-- Folhas de Estilo -->
		<link rel="stylesheet" href="stylesheets/reset.css" />
		<link rel="stylesheet" href="stylesheets/layout.css" />
		<!-- Javascripts -->
		<script src="javascript/jquery-latest.js"></script>
		<script src="javascript/jquery-effects.js"></script>
	</head>
	<body>
		<!-- Lista Telefônica -->
		<section id="listagem">
			<form action="index.php" method="post">
				<p class="trigger"><a href="#">Adicionar novo contato</a></p>
				<div class="profile-pic">
				</div>
				<div class="profile-info">
					<p><input type="text" class="person-name" placeholder="Nome Completo" name="nome" /></p>
					<p><input type="text" class="person-city" placeholder="Cidade, UF" name="local" /></p>
					<p><input type="text" class="person-phone" placeholder="(DDD) 0000-0000" name="telefone" /></p>
					<p><input type="text" class="person-email" placeholder="email@dominio.com" name="email" /></p>
					<p><input type="submit" value="Cadastrar" /></p>
				</div>
				<div class="clear"></div>
			</form>
			<?php recuperar_contatos(); ?>
		</section>
	</body>
</html>