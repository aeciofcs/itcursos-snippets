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
			<article>
				<div class="profile-pic" style="background:url('http://gravatar.com/avatar/ef060c5ec68b689dc2b616084ab9ebe5.png')">
				</div>
				<div class="profile-info">
					<p><span class="person-name">Lucas F. Cunha</span></p>
					<p><span class="person-city">Natal, RN</span></p>
					<p><span class="person-phone">(84) 9613-3492</span></p>
					<p><span class="person-email">lucasfercunha@gmail.com</span></p>
				</div>
				<div class="clear"></div>
			</article>
			<article>
				<div class="profile-pic" style="background:url('http://gravatar.com/avatar/e4ec2c7574d4981605455c3c9a0a4aaf.png')">
				</div>
				<div class="profile-info">
					<p><span class="person-name">Lucas M. Castro</span></p>
					<p><span class="person-city">Natal, RN</span></p>
					<p><span class="person-phone">(84) 0000-0000</span></p>
					<p><span class="person-email">lucasmcastro@gmail.com</span></p>
				</div>
				<div class="clear"></div>
			</article>
		</section>
	</body>
</html>