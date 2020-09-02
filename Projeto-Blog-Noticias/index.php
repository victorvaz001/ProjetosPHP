<?php
session_start();
require 'config.php';

if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
	header("Location: adminPage.php");
} 

?>
	

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Noticías do Brasil</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Economia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Política</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Esporte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Entrar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Noticías em tempo real</h1>
            <span class="subheading">24 Horas por dia</span>
          </div>
        </div>
      </div>
    </div>
  </header>

<?php
$sql = "SELECT * FROM noticias ORDER BY data_materia DESC";
$sql = $pdo->query($sql);
?>

   <?php
    if($sql->rowCount() > 0){
     foreach($sql->fetchAll() as $noticia):
    ?>
  <!-- Main Content -->
  <div class="container">
  	<div class="row">
  		<div class="col-lg-8 col-md-10 mx-auto">
  			<div class="post-preview">
  				<a href="index.php">        	
  					<h2 class="post-title">
  						<?php echo $noticia["titulo_materia"]; ?>
  					</h2>
  					<h3 class="post-subtitle">
  						<?php echo $noticia["conteudo_materia"]; ?>
  					</h3>	
  				</a>
  				<p class="post-meta">Posted by
  					<a href="index.php"><?php echo $noticia["nome_pessoa"]?></a>
  					on <?php echo $noticia["data_materia"]?></p>
  				</div>
  				<hr>
  			</div>
  		</div>
  		<?php
  	endforeach;
  } else{
  	echo "Não existem noticias cadastradas!";
  }
  ?>

  <div class="clearfix">
  	<a class="btn btn-primary float-right" href="index.php">Older Posts &rarr;</a>
  </div>
</div>






<hr/>
  <!-- Footer -->
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
