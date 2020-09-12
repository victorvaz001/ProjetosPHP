<?php
session_start();
require 'config.php';

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

} else {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pagina do Inicial - Bem vindo ao sistema</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Sistema de convites</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="convites.php">Meus convites</a>
          </li>
        </ul>
        <span class="navbar-text">
          <ul class="navbar-nav">
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['email']?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="logout.php" onclick="return confirm('Deseja sair do sistema?')">Sair</a>
            </div>
          </li>
        </ul>
        </span>
      </div>

    </nav>
      <h1>Bem vindo ao Sistema de convites</h1>

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