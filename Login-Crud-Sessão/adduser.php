<?php
session_start();
require 'config.php';

if(isset($_POST["nome"]) && !empty($_POST["nome"])){
  
    $nome  = addslashes($_POST["nome"]);
    $email = addslashes($_POST["email"]);
    $senha = md5(addslashes($_POST["senha"]));

    $sql = "INSERT INTO usuarios SET
            nome = '$nome', email = '$email', senha = '$senha'";
    $pdo->query($sql);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		 <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Sistema Of Users</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adduser.php">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link enable" href="index.php" tabindex="-1" aria-disabled="true">
              <?php
              if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
                $nome = $_SESSION['nome'];
                echo "Hello ".$nome;
              } else {  
                header("Location: login.php");
              }
              ?>
            </a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <a class="btn btn-outline-success my-2 my-sm-0"  href="logout.php">Logout</a>
        </form>
      </div>
    </nav>
    <br/>
    <h2 style="text-align: center;">Registration Users</h2>
	<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Name</label>
      <input type="text" class="form-control" name="nome" required>
    </div>
    <div class="form-group col-md-6">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" name="senha" maxlength="10"
    placeholder="Max 10 characters" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Save</button>
  <a href="index.php" class="btn btn-danger">Cancel</a>
</form>
<br/>
<div class="card w-100" style="text-align: center;">
  <div class="card-body">
    <h5 class="card-title">Sistema web com PHP</h5>
    <p class="card-text">Sistema de Controle de usuários, Login com sessão, Insert, Delete, Update e Select<br> <h5 class="card-title">Programador<br></h5>
    Victor Gonçalves Vaz<br>victorvaz001@gmail.com </p>
    <a href="index.php" class="btn btn-primary">Home</a>
    <p>Todos os direitos reservados &copy; - <?php

    date_default_timezone_set('America/Sao_Paulo');

    $dataAtual = date("d/m/y \á\s H:i:s");

    echo $dataAtual;
    ?></p>
  </div>
</div>
	</div>
</body>
</html>