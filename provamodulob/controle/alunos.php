<?php
	/*
	 * OBTENÇÃO DA LISTA DE ALUNOS
	 */
	function obterAlunos() {
		$conteudo = file_get_contents("db/alunos.txt");
		$conteudo = str_replace(array("Nome: ", "Email: ", "Telefone: "), "", $conteudo);
		$linhas = explode(PHP_EOL, $conteudo);
		$alunos;
		$quantidade = floor(count($linhas) / 3);
		for ($i = 0; $i < $quantidade; $i++) { 
			$linhaNome 		= ($i*3) + 0;
			$linhaEmail 	= ($i*3) + 1;
			$linhaTelefone 	= ($i*3) + 2;
			$aluno = array($linhas[$linhaNome], $linhas[$linhaEmail], $linhas[$linhaTelefone]);
			$alunos[] = $aluno;
		}
		return @$alunos;
	}

	/*
	 * VERIFICAR SE ALUNO JA EXISTE
	 */
	function verificarAluno($email) {
		$alunos = obterAlunos();
		for ($i = 0; $i < sizeof($alunos); $i++) {
			if ($alunos[$i][1] == $email)
				return $i;
		}
		return -1;
	}

	/*
	 * SALVAMENTO DE UM NOVO ALUNO
	 */
	function salvarAluno() {
		if (isset($_POST['source'])) {
			$validacao = true;
			$validacao &= isset($_POST['nome']);
			$validacao &= isset($_POST['email']);
			$validacao &= isset($_POST['telefone']);
			$validacao &= @$_POST['nome'] != "";
			$validacao &= @$_POST['email'] != "";
			$validacao &= @$_POST['telefone'] != "";
			if (!$validacao)
				header("Location: ?alunos/novo/erro");
			elseif (verificarAluno($_POST['email']) != -1)
				header("Location: ?alunos/novo/email");
			else {
				$data = "Nome: " . $_POST['nome'] . PHP_EOL;
				$data .= "Email: " . $_POST['email'] . PHP_EOL;
				$data .= "Telefone: " . $_POST['telefone'] . PHP_EOL;
				file_put_contents("db/alunos.txt", $data, FILE_APPEND);
				header("Location: ?alunos/index");
			}
		}
	}

	/*
	 * IMPRESSÃO DA TABELA COM A LISTAGEM DE ALUNOS
	 */
	function imprimirAlunosTabela() {
		if (file_exists("db/alunos.txt")) {
			$alunos = obterAlunos();
			$print = "<table id=\"sorted\" class=\"tablesorter\"><thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th></tr></thead><tbody>";
			for ($i = 0; $i < sizeof($alunos); $i++) { 
				$print .= "<tr id=\"aluno-$i\" " . printNotaAluno($alunos[$i][1]) . ">";
				for ($j = 0; $j < 3; $j++) { 
					$print .= "<td>{$alunos[$i][$j]}</td>";
				}
				$print .= "</tr>";
			}
			$print .= "</tbody><tfoot><tr><td colspan=\"3\">Total de alunos: <span class=\"quantidade\">" . sizeof($alunos) . "</span></td></tr></tfoot></table>";
			echo $print;
		}
	}

	/*
	 * IMPRESSÃO DO SELECT BOX COM A LISTAGEM DE ALUNOS
	 */
	function imprimirAlunosSelect() {
		if (file_exists("db/alunos.txt")) {
			$alunos = obterAlunos();
			$print = "";
			for ($i = 0; $i < sizeof($alunos); $i++)
				$print .= "<option value=\"{$alunos[$i][1]}\">{$alunos[$i][0]}</option>";
			echo $print;
		}
	}
?>