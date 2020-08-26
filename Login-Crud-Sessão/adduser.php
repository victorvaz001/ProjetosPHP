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
              $nome = $_SESSION['nome'];
              echo "Hello ".$nome;
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
	<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Name</label>
      <input type="text" class="form-control" name="nome">
    </div>
    <div class="form-group col-md-6">
      <label for="senha">E-mail</label>
      <input type="email" class="form-control" name="email">
    </div>
  </div>
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" name="senha" maxlength="10"
    placeholder="Max 10 characters">
  </div>
  
  <button type="submit" class="btn btn-primary">Save</button>
</form>
	</div>
</body>
</html>