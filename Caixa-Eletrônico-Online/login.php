<?php
session_start();
require 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

	<style type="text/css">
			
		.row{
			justify-content: center;
		}
	</style>

		<title>Caixa Eltrônico onlinie</title>
</head>
<body>
	<div class="container">
		<br/><br/>
		<div class="row">

			<aside class="col-sm-4">
				
				<div class="card">
					<article class="card-body">
						<h4 class="card-title text-center mb-4 mt-1">Login</h4>
						<hr>
						<p class="text-success text-center">Caixa Eletrônico Online</p>
						<form method="POST">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-university"></i> </span>
									</div>
									<input type="text" class="form-control" placeholder="Informe sua Agência" name="agencia">
								</div> <!-- input-group.// -->
							</div> <!-- form-group// -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-user"></i> </span>
									</div>
									<input type="text" class="form-control" placeholder="Informe sua  conta" name="conta">
								</div> <!-- input-group.// -->
							</div> <!-- form-group// -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
									</div>
									<input class="form-control" placeholder="******" type="password" name="senha">
								</div> <!-- input-group.// -->
							</div> <!-- form-group// -->
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Login  </button>
							</div> <!-- form-group// -->
							<?php
							if(isset($_POST['agencia']) && !empty($_POST['agencia'])){

								$agencia = addslashes($_POST['agencia']);
								$conta = addslashes($_POST['conta']);
								$senha = addslashes($_POST['senha']);

								$sql = $pdo->prepare("SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha");
								$sql->bindValue(":agencia", $agencia);
								$sql->bindValue(":conta", $conta);
								$sql->bindValue(":senha", md5($senha));
								$sql->execute();

								if($sql->rowCount() > 0){
									$dado = $sql->fetch();

									$_SESSION['userbanco'] = $dado['id'];
									header("Location: index.php");

								} else {
									echo '<div class="alert alert-danger" role="alert" style="text-align: center;">
											Usuário ou senha inválidos!
										</div>';
								}
							}
							?>
						</form>
					</article>
				</div> <!-- card.// -->

			</aside> <!-- col.// -->
		</div> <!-- row.// -->
<br/>
		<div class="card text-center">
			<div class="card-footer text-muted">
				<p><img src="img/user.jpg" width="30" height="30"> Victor Gonçalves Vaz | <img src="img/email.png" width="30" height="30"> victorvaz001@gmail.com |
					<a href="https://github.com/victorvaz001/ProjetosPHP" target="_blank"><img src="img/github.png" width="30" height="30"> Meu Git/Hub</a> </p>

				</div>
			</div>
	</div> 


</body>
</html>



