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
  <title>Sistema de Usuários</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Sistema de Usuarios</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link enable" href="index.php" tabindex="-1" aria-disabled="true">
              <?php
              $nome = $_SESSION['nome'];
              echo "Olá ".$nome;
              ?>
            </a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <a class="btn btn-outline-success my-2 my-sm-0"  href="logout.php">Logout</a>
        </form>
      </div>
    </nav>
  </div>
</body>
</html>
