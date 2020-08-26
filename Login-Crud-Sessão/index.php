<?php
session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sistema de Usuários</title>
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
    <table class="table table-hover" style="text-align: center;">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "SELECT * FROM usuarios";
      $sql = $pdo->query($sql);

      if($sql->rowCount() > 0){

          foreach($sql->fetchAll() as $usuario){

              echo '<tr>';
              echo '<td>'.$usuario["id"].'</td>';
              echo '<td>'.$usuario["nome"].'</td>';
              echo '<td>'.$usuario["email"].'</td>';
              echo '<td><a href="updateUser.php?id='.$usuario["id"].'"
              class="btn btn-outline-info">Update</a></td>';
              echo '<td><a href="deleteUser.php?id='.$usuario["id"].'"
              class="btn btn-outline-danger">Delete</a></td>';
              echo '</tr>';
          }
      }
    ?>
  </tbody>
</table>
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
