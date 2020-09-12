<?php
session_start();
require 'config.php';



?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Login de usuários</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Site de convidados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"
                    onclick="return alert('Está página é acessível somente com convite, por favor entre em contato com o administrador do sistema')">Registro</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro</div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="senha" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <?php
                                if(isset($_POST['email']) && !empty($_POST['email'])){

                                    $email = addslashes($_POST['email']);
                                    $senha = md5(addslashes($_POST['senha']));


                                    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
                                    $sql = $pdo->query($sql);

                                    if($sql->rowCount() > 0){
                                        foreach($sql->fetchAll() as $usuario){

                                          $_SESSION['id'] = $usuario['id'];
                                          $_SESSION['email'] = $usuario['email'];
                                          $_SESSION['convite'] = $usuario['convites'];
                                          $_SESSION['codigo_sessao'] = $usuario['codigo'];


                                          header("Location: index.php");
                                      } 
                                  } else {
                                     
                                     echo ' <br/>
                                     <div class="alert alert-danger" role="alert">
                                     Usuário ou senha invalidos!
                                     </div>';
                                     
                                 }
                             }
                             ?>
                         </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
<div class="container">
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