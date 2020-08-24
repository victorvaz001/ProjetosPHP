<?php
require 'config.php';

$id = 0;
if(isset($_GET["id"]) && !empty($_GET["id"])){

	$id = addslashes($_GET["id"]);

	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$sql = $pdo->query($sql);

	if($sql->rowCount() > 0){
		$dado = $sql->fetch();
	}else {
		header("Location: index.php");
	}
}

if(isset($_POST["nome"]) && !empty($_POST["nome"])){

	$nome = addslashes($_POST["nome"]);
	$email = addslashes($_POST["email"]);
	$senha = md5(addslashes($_POST["senha"]));

	$sql = "UPDATE usuarios SET 
			nome = '$nome', email = '$email', senha = '$senha'
			WHERE id = '$id'";
	$pdo->query($sql);

	header("Location: index.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualizar Usuários</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
   <br/>
   <h3 style="text-align: center;">Edit User</h3>
   <a class="btn btn-primary" href="index.php" role="button">Home</a>
   <br/><br/>	
   <form method="POST">
    <div class="form-group">
      <label for="nome">Name</label>
      <input type="nome" class="form-control"  name="nome" required 
      value="<?php echo $dado["nome"]; ?>">
    </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" class="form-control"  name="email" required
      value="<?php echo $dado["email"]; ?>">
    </div>
    <div class="form-group">
      <label for="senha">Password</label>
      <input type="password" class="form-control" name="senha" required
      value="<?php echo $dado["senha"]; ?>">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
  </form>
</div>
</body>
</html>