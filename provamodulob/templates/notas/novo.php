<?php include 'controle/notas.php'; ?>
<?php include 'controle/alunos.php'; ?>
<?php salvarNota(); ?>
<?php if (defined('MAIN_PAGE')): ?>
	<h1 class="container_4">Cadastro de Notas</h1>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
		<p class="container_4 field_holder">
			<label for="aluno">Aluno</label>
			<select id="aluno" name="aluno">
				<option value="-1">SELECIONE</option>
				<?php imprimirAlunosSelect(); ?>
			</select>
		</p>
		<p class="container_4 field_holder">
			<label for="nota1">Primeira Nota</label>
			<input type="text" id="nota1" name="nota1" required />
		</p>
		<p class="container_4 field_holder">
			<label for="nota2">Segunda Nota</label>
			<input type="text" id="nota2" name="nota2" required />
		</p>
		<p class="container_4 field_holder">
			<label for="nota3">Terceira Nota</label>
			<input type="text" id="nota3" name="nota3" required />
		</p>
		<p class="container_4 submit_holder">
			<input type="submit" value="Cadastrar" />
			<input type="reset" onclick="return confirm('Tem certeza que deseja apagar todos os campos?');" value="Cancelar" />
			<input type="hidden" name="source" value="novo" />
		</p>
		<?php if (@$parameter == "erro"): ?>
		<p class="submit_error">
			Você precisa preencher todos os campos.
		</p>
		<?php elseif (@$parameter == "tamanho"): ?>
		<p class="submit_error">
			A nota só pode ser de 0 até 10.
		</p>
		<?php elseif (@$parameter == "sucesso"): ?>
		<p class="submit_success">
			Nota salva com sucesso.
		</p>
		<?php endif ?>
	</form>
<?php else: ?>
	<h1>Acesso Negado</h1>
	<p>N&atilde;o &eacute; permitido acesso direto.</p>
<?php endif ?>