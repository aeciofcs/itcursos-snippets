<?php if (defined('MAIN_PAGE')): ?>
<?php 
	echo "<ul>";
		echo "<li class=\"grid_1\"><a href=\"./\">Início</a></li>";
		echo "<li class=\"grid_1 submenu\">";
			echo "<a href=\"#\">Alunos ▼</a>";
			echo "<ul>";
				echo "<li class=\"grid_1\"><a href=\"./?alunos/novo\">Cadastro</a></li>";
				echo "<li class=\"grid_1\"><a href=\"./?alunos/index\">Listagem</a></li>";
			echo "</ul>";
		echo "</li>";
		echo "<li class=\"grid_1\"><a href=\"./?notas/novo\">Notas</a></li>";
		echo "<li class=\"grid_1\"><a href=\"./?geral/sobre\">Sobre</a></li>";
	echo "</ul>";
?>
<?php else: ?>
	<h1>Acesso Negado</h1>
	<p>N&atilde;o &eacute; permitido acesso direto.</p>
<?php endif ?>