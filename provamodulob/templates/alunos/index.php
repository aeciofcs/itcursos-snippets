<?php include 'controle/alunos.php'; ?>
<?php include 'controle/notas.php'; ?>
<?php if (defined('MAIN_PAGE')): ?>
	<h1 class="container_4">Listagem de Alunos</h1>
	<?php imprimirAlunosTabela(); ?>
<?php else: ?>
	<h1>Acesso Negado</h1>
	<p>N&atilde;o &eacute; permitido acesso direto.</p>
<?php endif ?>