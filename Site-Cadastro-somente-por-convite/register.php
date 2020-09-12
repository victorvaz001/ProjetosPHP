<?php
session_start();
require 'config.php';



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
    <form method="POST">

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
      <br/>
      <?php


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
        exit;
      }


      if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $dado){

          $convites = $dado['convites'];
          $email_remetente = $dado['email'];
        }

      }


      if($convites < 5){

        if(isset($_POST['email']) && !empty($_POST['email'])){

          $email = addslashes($_POST['email']);
          $senha = md5(addslashes($_POST['senha']));
          $codigo = md5($codigo);

          $sql = "SELECT * FROM usuarios WHERE email = '$email'";
          $sql = $pdo->query($sql);

          if($sql->rowCount() > 0){

           echo ' <br/>
           <div class="alert alert-danger" role="alert">
           Esté email já existe!
           </div>';  

         } else {

          $sql = "INSERT INTO usuarios (email, senha, codigo) VALUES 
          ('$email', '$senha', '$codigo')";
          $sql = $pdo->query($sql);


          $convites++;

          $sql = "UPDATE usuarios SET convites = '$convites' WHERE email = '$email_remetente'";
          $sql = $pdo->query($sql);
          header("Location: login.php");
          exit;
        }
      }
    } else {
      header("Location: codigo-invalido.php");
    }
    ?>
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