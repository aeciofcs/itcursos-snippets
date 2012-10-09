<?php
	# IT Cursos - Academia de Programação
	# Aluno: Lucas Ferreira da Cunha
	# Email: lucasfercunha@gmail.com

	// 1. Dados
	// Constantes do programa
	/////////////////////////////////////////////////////////////////
	define('ARQUIVO', 'agenda.dat');

	// 2. Funcionalidades
	// Métodos auxiliares de validação e impressão
	/////////////////////////////////////////////////////////////////
	function valida_campos() {
		if (isset($_POST['nome']))
			if (isset($_POST['local']))
				if (isset($_POST['telefone']))
					if (isset($_POST['email'])) {
						$nome = $_POST['nome'];
						$cidade = $_POST['local'];
						$telefone = $_POST['telefone'];
						$email = $_POST['email'];
						salvar_contato($nome, $cidade, $telefone, $email);
					}
	}
	function verificar_agenda() {
		// Cria o arquivo
		if (!(file_exists(ARQUIVO))) {
			$handle = fopen(ARQUIVO, 'w');
			fclose($handle);
		}
		return true;
	}
	function ordenar_array($contatos) {
		// FUNÇÃO INCOMPLETA
	}
	function imprimir_agenda($contatos) {
		$view = "";
		//$contatos = ordenar_array($contatos);
		foreach ($contatos as $pessoa) {
			$view .= '<article>';
				$view .= '<div class="profile-pic" style="background: url(\'http://gravatar.com/avatar/' . md5($pessoa['email']) . '.png\')"></div>';
				$view .= '<div class="profile-info">';
					$view .= '<p><span class="person-name">' . $pessoa['nome'] . '</span></p>';
					$view .= '<p><span class="person-city">' . $pessoa['cidade'] . '</span></p>';
					$view .= '<p><span class="person-phone">' . $pessoa['telefone'] . '</span></p>';
					$view .= '<p><span class="person-email">' . $pessoa['email'] . '</span></p>';
				$view .= '</div>';
				$view .='<div class="clear"></div>';
			$view .= '</article>';
		}
		echo $view;
	}

	// 3. Manipulação
	// Métodos para a manipulação do arquivo de addos
	/////////////////////////////////////////////////////////////////
	function salvar_contato($nome, $cidade, $telefone, $email) {
		// Remoção de caracter proibido
		$nome = str_replace(";", ",", $nome);
		$cidade = str_replace(";", ",", $cidade);
		$telefone = str_replace(";", ",", $telefone);
		$email = str_replace(";", ",", $email);
		// Geração do conteúdo
		$conteudo = implode(";", array($nome, $cidade, $telefone, $email)) . ";";
		// Salvar conteúdo
		file_put_contents(ARQUIVO, $conteudo, FILE_APPEND);
	}
	function recuperar_contatos() {
		// Leitura do arquivo
		verificar_agenda();
		$conteudo = file_get_contents(ARQUIVO);
		// Explosão por linha e coluna
		$contatos;
		if (strlen($conteudo) != 0) {
			$dados = explode(';', $conteudo);
			for ($i = 0; $i < ((count($dados) - 1) / 4); $i++) { 
				// Calcula os índices correspondentes aos dados
				$indice_nome = ($i * 4) + 0;
				$indice_cidade = ($i * 4) + 1;
				$indice_telefone = ($i * 4) + 2;
				$indice_email = ($i * 4) + 3;
				// Coloca numa nova variável
				$contatos[$i]['nome'] = $dados[$indice_nome];
				$contatos[$i]['cidade'] = $dados[$indice_cidade];
				$contatos[$i]['telefone'] = $dados[$indice_telefone];
				$contatos[$i]['email'] = $dados[$indice_email];
			}
			// Impressão
			imprimir_agenda($contatos);
		}
	}
?>