<?php define("MAIN_PAGE", "true") ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Geral -->
		<title>Modulo B - Projeto Final</title>
		<meta charset="utf-8">
		<!-- Folha de Estilo -->
		<link rel="stylesheet" href="publico/estilos/reset.css" />
		<link rel="stylesheet" href="publico/estilos/grade.css" />
		<link rel="stylesheet" href="publico/estilos/layout.css" />
		<!-- Scripts -->
		<script src="publico/scripts/jquery.js"></script>
		<script src="publico/scripts/transicoes.js"></script>
		<script src="publico/scripts/tooltip.js"></script>
		<script src="publico/scripts/sorter/jquery.tablesorter.min.js"></script>
	</head>
	<body>
		<!-- Cabeçalho -->
		<header class="container_4 clearfix">
			<h1>Sistema Acadêmico</h1>
		</header>
		<!-- Menu -->
		<nav class="container_4 clearfix">
			<?php include 'templates/geral/menu.php'; ?>
		</nav>
		<!-- Conteúdo -->
		<section class="container_4 clearfix">
			<?php include 'controle/rotas.php'; ?>
		</section>
		<!-- Rodapé -->
		<footer class="container_4 clearfix">
			<p class="grid_2">Sistema desenvolvido por<br /><a href="./?geral/sobre" title="Sobre">Lucas Ferreira</a></p>
			<p class="grid_2">Visual inspirado em <a href="http://www.appacademy.io/" title="Inspirado em AppAcademy">AppAcademy</a><br />Nenhum HTML ou CSS foi copiado.</p>
		</footer>
	</body>
</html>