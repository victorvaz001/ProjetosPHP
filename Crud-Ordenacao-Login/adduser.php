<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema PHP - CRUD - MySQL - Ordenação - Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #f5f5f5;">	
   <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm sticky-top">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php"
    style="text-decoration: none;">CRUD</h5></a>
 
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="index.php">Home</a>
    <a class="p-2 text-dark" href="adduser.php">New User</a>
    <?php
      if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){

          $nome = $_SESSION["nome"];
          echo '<a href="index.php"> Hello '.$nome.'</a>';
      } else {
        header("Location: login.php");
      }
    ?>

  </nav>
 <a class="btn btn-outline-primary" href="logout.php" onclick="return confirm('Finalizar sessão?');">Logout</a>


 
</div>
	<div class=container>
		<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h2 class="display-5">Add New User</h2>

</div>
	<form>
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
    <label for="idade">Age</label>
    <input type="number" class="form-control" name="idade" placeholder="Only Numbers" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="sexo">Sex</label>
      <input type="sexo" class="form-control" name="sexo" placeholder="M ou F" required>
    </div>
    <div class="form-group col-md-6">
      <label for="senha">Password</label>
      <input type="password" class="form-control" name="senha" maxlength="10" placeholder="Max 10 characters" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
  <a type="submit" class="btn btn-danger" href="index.php">Cancel</a>
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