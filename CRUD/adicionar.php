<?php
require 'config.php';

if(isset($_POST["nome"]) && !empty($_POST["nome"])){

    $nome = addslashes($_POST["nome"]);
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
	<title>Cadastro de Usuários</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
   <br/>
   <h3 style="text-align: center;">User Registration</h3>
   <a class="btn btn-primary" href="index.php" role="button">Home</a>
   <br/><br/>	
   <form method="POST">
    <div class="form-group">
      <label for="nome">Name</label>
      <input type="nome" class="form-control"  name="nome" required 
      placeholder="Digite seu Nome">
    </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" class="form-control"  name="email" required
      placeholder="Digite seu E-mail">
    </div>
    <div class="form-group">
      <label for="senha">Password</label>
      <input type="password" class="form-control" name="senha" required
      placeholder="Digite sua senha">
    </div>
    <button type="submit" class="btn btn-success">Save</button><br/><br/>
  </form>
  <div class="card text-center">
  <div class="card-header">
    Sistema de Controle de Usuários
  </div>
  <div class="card-body">
    <h5 class="card-title">Tecnologias</h5>
    <p class="card-text">PHP 7.4.8 - PDO - MySQL - Bootstrap </p>
     <h5 class="card-title">Programador</h5>
     <p class="card-text">Victor Gonçalves Vaz<br>
       victorvaz001@gmail.com</p>
    <a href="index.php" class="btn btn-primary">Home</a>
  </div>
  <div class="card-footer text-muted">
    <?php
    date_default_timezone_set('America/Sao_Paulo');
  $dataAtual = date("d/m/yy \-\ H:i:s");
  echo "Todos os direitos reservados &copy; - ".$dataAtual;
    ?>
  </div>
</div>
</div>
</body>
</html>