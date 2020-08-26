<?php
session_start();
require 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Cadastro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">

</head>
<body class="text-center">

  <form class="form-signin" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="senha" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <br/>
    <?php
    if(isset($_POST['email']) && !empty($_POST['email'])){

      $email = addslashes($_POST["email"]);
      $senha = md5(addslashes($_POST["senha"]));

      $sql = $pdo->query("SELECT * FROM usuarios WHERE
       email = '$email' AND senha = '$senha'");   


      if($sql->rowCount() > 0){
        $dado = $sql->fetch();

        $_SESSION['id'] = $dado['id'];
        $_SESSION['nome'] = $dado['nome'];
        header("Location: index.php");
      } else {
        echo '<div class="alert alert-danger" role="alert">
        Usuário ou Senha invalidos!
        </div>';
      }
    }
    ?>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>
</body>
</div>
</body>
</html>