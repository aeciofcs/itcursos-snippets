<?php
	/*
	 * OBTENÇÃO DA LISTA DE ALUNOS
	 */
	function obterNotas() {
		$conteudo = file_get_contents("db/notas.txt");
		$conteudo = str_replace(array("Email: ", "Nota 1: ", "Nota 2: ", "Nota 3: "), "", $conteudo);
		$linhas = explode(PHP_EOL, $conteudo);
		$notas;
		$quantidade = floor(count($linhas) / 4);
		for ($i = 0; $i < $quantidade; $i++) { 
			$linhaEmail	= ($i*4) + 0;
			$linhaNota1 = ($i*4) + 1;
			$linhaNota2 = ($i*4) + 2;
			$linhaNota3	= ($i*4) + 3;
			$nota = array($linhas[$linhaEmail], $linhas[$linhaNota1], $linhas[$linhaNota2], $linhas[$linhaNota3]);
			$notas[] = $nota;
		}
		return @$notas;
	}

	/*
	 * VERIFICAR SE NOTA JA EXISTE
	 */
	function verificarNota($email) {
		$notas = obterNotas();
		for ($i = 0; $i < sizeof($notas); $i++) {
			if ($notas[$i][0] == $email)
				return $i;
		}
		return -1;
	}

	/*
	 * APAGAR NOTA JA EXISTENTE
	 */
	function removerNota($indice) {
		$conteudo = file_get_contents("db/notas.txt");
		$linhas = explode(PHP_EOL, $conteudo);
		unset($linhas[($indice*4) + 0]);
		unset($linhas[($indice*4) + 1]);
		unset($linhas[($indice*4) + 2]);
		unset($linhas[($indice*4) + 3]);
		$conteudo = implode(PHP_EOL, $linhas);
		file_put_contents("db/notas.txt", $conteudo);
	}

	/*
	 * SALVAMENTO DE NOVAS NOTAS
	 */
	function salvarNota() {
		if (isset($_POST['source'])) {
			$validacao = true;
			$validacao &= isset($_POST['aluno']);
			$validacao &= isset($_POST['nota1']);
			$validacao &= isset($_POST['nota2']);
			$validacao &= isset($_POST['nota2']);
			$validacao &= (@$_POST['aluno'] != "-1");
			$validacao &= (@$_POST['nota1'] != "");
			$validacao &= (@$_POST['nota2'] != "");
			$validacao &= (@$_POST['nota3'] != "");
			$rangenota = true;
			$rangenota &= (@$_POST['nota1'] <= 10);
			$rangenota &= (@$_POST['nota1'] >= 0);
			$rangenota &= (@$_POST['nota2'] <= 10);
			$rangenota &= (@$_POST['nota2'] >= 0);
			$rangenota &= (@$_POST['nota3'] <= 10);
			$rangenota &= (@$_POST['nota3'] >= 0);
			if (!$validacao)
				header("Location: ?notas/novo/erro");
			elseif (!$rangenota)
				header("Location: ?notas/novo/tamanho");
			else {
				$indice = verificarNota($_POST['aluno']);
				if ($indice != -1)
					removerNota($indice);
				$data = "Email: " . $_POST['aluno'] . PHP_EOL;
				$data .= "Nota 1: " . $_POST['nota1'] . PHP_EOL;
				$data .= "Nota 2: " . $_POST['nota2'] . PHP_EOL;
				$data .= "Nota 3: " . $_POST['nota3'] . PHP_EOL;
				file_put_contents("db/notas.txt", $data, FILE_APPEND);
				header("Location: ?notas/novo/sucesso");
			}
		}
	}

	/*
	 * RECUPERAR NOTA DE UM ALUNO ESPECIFICO
	 */
	function printNotaAluno($email) {
		$indice = verificarNota($email);
		if ($indice == -1)
			return "title=\"<b>Indefinido</b> - Não possui notas\" class=\"estado-3\"";
		$notas = obterNotas();
		$media = 0;
		$media += $notas[$indice][1];
		$media += $notas[$indice][2];
		$media += $notas[$indice][3];
		$media /= 3;
		if (strlen($media) > 3)
			$media = substr($media, 0, 3);
		if ($media >= 7)
			return "title=\"<b>Aprovado</b> - Média $media\" class=\"estado-0\"";
		elseif ($media < 3.2)
			return "title=\"<b>Reprovado</b> - Média $media\" class=\"estado-1\"";
		else
			return "title=\"<b>Recuperação</b> - Média $media\" class=\"estado-2\"";
	}
?>