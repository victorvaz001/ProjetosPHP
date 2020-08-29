<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br ">
  <head>
  
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <form class="form-signin" method="POST">
  <img class="mb-4" src="logophp.png" alt="" width="150" height="150">
  <h1 class="h4 mb-3 font-weight-normal">Please sign in</h1>

  <label for="email" class="sr-only">Email address</label>
  <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>

  <label for="senha" class="sr-only">Password</label>
  <input type="password" name="senha" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <?php
    if(isset($_POST["email"]) && !empty($_POST["email"])){

        $email = addslashes($_POST["email"]);
        $senha = md5(addslashes($_POST["senha"]));

        $sql = $pdo->query("SELECT * FROM aluno WHERE
              email = '$email' AND senha = '$senha'");

        if($sql->rowCount() > 0){
          $dado = $sql->fetch();

          $_SESSION["id"] = $dado["id"];
          $_SESSION["nome"] = $dado["nome"];
          header("Location: index.php");
        } else {
          echo "Usuário ou senha invalidos!";
        }
    }
  ?>

  <p class="mt-5 mb-3 text-muted">Sistema CRUD - &copy; 2020<br/>
  <h5>Meu Github</h5>
        <a href="https://github.com/victorvaz001/ProjetosPHP" target="_blank"><img class="mb-2" src="GitHub-Mark.png" alt="" width="40" height="40"></a></p>
</form>

</body>
</html>
