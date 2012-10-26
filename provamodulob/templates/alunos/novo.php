<?php include 'controle/alunos.php'; ?>
<?php salvarAluno(); ?>
<?php if (defined('MAIN_PAGE')): ?>
	<h1 class="container_4">Cadastro de Aluno</h1>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
		<p class="container_4 field_holder">
			<label for="nome">Nome</label>
			<input type="text" id="nome" name="nome" required />
		</p>
		<p class="container_4 field_holder">
			<label for="email">E-mail</label>
			<input type="text" id="email" name="email" required />
		</p>
		<p class="container_4 field_holder">
			<label for="telefone">Telefone</label>
			<input type="text" id="telefone" name="telefone" required />
		</p>
		<p class="container_4 submit_holder">
			<input type="submit" value="Cadastrar" />
			<input type="reset" onclick="return confirm('Tem certeza que deseja apagar todos os campos?');" value="Cancelar" />
			<input type="hidden" name="source" value="novo" />
		</p>
		<?php if (@$parameter == "error"): ?>
		<p class="submit_error">
			Você precisa preencher todos os campos.
		</p>
		<?php elseif (@$parameter == "email"): ?>
		<p class="submit_error">
			O e-mail informado já foi cadastrado antes.
		</p>
		<?php endif ?>
	</form>
<?php else: ?>
	<h1>Acesso Negado</h1>
	<p>N&atilde;o &eacute; permitido acesso direto.</p>
<?php endif ?>