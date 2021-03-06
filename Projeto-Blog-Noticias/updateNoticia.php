<?php
session_start();
require 'config.php';

if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){

	$nome = $_SESSION["nome"];
} else {
	header("Location: login.php");
}

?>

<?php

$id = 0;
if(isset($_GET["id"]) && !empty($_GET["id"])){

	$id = addslashes($_GET["id"]);

	$sql = "SELECT * FROM noticias WHERE id = $id";
	$sql = $pdo->query($sql);

	if($sql->rowCount() > 0){
		$noticia = $sql->fetch();
	} else {
		header("Location: adminPage.php");
	}
}

if(isset($_POST["titulo"]) && !empty($_POST["titulo"])){

	
	$titulo = addslashes($_POST["titulo"]);
	$conteudo = addslashes($_POST["conteudo"]);
	$nome = addslashes($_POST["nome"]);

	$sql = "UPDATE noticias SET 
	titulo_materia  = '$titulo', conteudo_materia  = '$conteudo', nome_pessoa  = '$nome' WHERE id = '$id'";

	$pdo->query($sql);
	header("Location: adminPage.php");
} 

?>



<!DOCTYPE html>
<html>
<head>
	<title>Atualizar Notícia</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="addNoticia.php">Noticias do Brasil</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-link active" href="index.php">Voltar <span class="sr-only">(current)</span></a>
					<a class="nav-link" href="addNoticia.php"><?php echo "Olá ".$nome?></a>
					<a class="nav-link" href="logout.php" onclick="return confirm('Deseja ecerrar sessão?')">Sair</a>
				</div>
			</div>	
		</nav>
		<h2 style="text-align: center;">Atualizar Noticía</h2>
		<form method="POST">
			<div class="form-group">
				<label for="titulo">Titulo</label>
				<input type="text" class="form-control" name="titulo" required
				value="<?php echo $noticia["titulo_materia"]; ?>"/>
			</div>

			<div class="form-group">
				<label for="conteudo">Conteudo</label>
				<textarea class="form-control" rows="3" name="conteudo" required/><?php echo $noticia["conteudo_materia"]; ?></textarea>
			</div>

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" required
				value="<?php echo $noticia["nome_pessoa"]; ?>"/>
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
			<a type="submit" class="btn btn-danger" href="adminPage.php"
			onclick="return confirm('Confirmar o cancelamento?');">Cancel</a>

		</form>

		<footer class="pt-4 my-md-5 pt-md-5 border-top">
			<div class="row">
				<div class="col-6 col-md">
					<h5>Meu Github</h5>
					<a href="https://github.com/victorvaz001/ProjetosPHP" target="_blank"><img class="mb-2" src="GitHub-Mark.png" alt="" width="40" height="40"></a>
					
				</div>
				<div class="col-6 col-md">
					<h5>Contato</h5>
					<ul class="list-unstyled text-small">
						<li><p>Victor Gonçalves Vaz<br/>victorvaz001@gmail.com</p></li>

					</ul>
				</div>
				<div class="col-6 col-md">
					<h5>Sobre o Sistema</h5>
					<ul class="list-unstyled text-small">
						<li><a class="text-muted" href="https://www.php.net/" target="_blank">PHP</a></li>
						<li><a class="text-muted" href="https://www.mysql.com/" target="_blank">MySQL</a></li>
						<li><a class="text-muted" href="https://getbootstrap.com/" target="_blank">Bootstrap</a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>


</body>
</html>