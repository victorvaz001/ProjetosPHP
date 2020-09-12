<?php
session_start();
require 'config.php';

if(isset($_GET['codigo']) && !empty($_GET['codigo'])){

        $codigo = addslashes($_GET['codigo']);

        $sql = "SELECT * FROM usuarios WHERE codigo = '$codigo'";
        $sql = $pdo->query($sql);

        if($sql->rowCount() == 0){

          header("Location: codigo-invalido.php");
          exit;
        } 
} else {
      header("Location: codigo-invalido.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Pagina de cadastro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>


	<div class="container">

		
    <br/>

    <h2 style="text-align: center;">Cadastro de usuário convidado</h2>
    <br/>
        <div class="text-muted">
      Você foi convidado para se cadastrar no nosso sistema de convites, <div class="font-weight-bold">por favor informe os dados abaixo.</div>
    </div>
    <br/>
    <form>

  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <small id="emailHelp" class="form-text text-muted">Informe seu E-mail</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" name="senha" id="exampleInputPassword1" required>
      <small id="emailHelp" class="form-text text-muted">Informe sua senha</small>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
  <a type="submit" class="btn btn-danger" href="login.php" onclick="return confirm('Deseja cancelar o cadastro?')">Cancelar</a>
</form>
  </div>
</body>
</html>