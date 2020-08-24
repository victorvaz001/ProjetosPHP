<?php
require 'config.php';

$sql = "SELECT * FROM usuarios";
$sql = $pdo->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Lita de Usuários</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h3 style="text-align: center;">List of Users</h3>
	<br/>
	<a class="btn btn-primary" href="adicionar.php" role="button">New User</a>
	<br/><br/>
	<table class="table table-hover">
  <thead>
    <tr style="text-align: center;">
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col" colspan="2">Ações</th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
  	<?php
  	if($sql->rowCount() > 0){
		foreach($sql->fetchAll() as $usuario){
			echo '<tr>';
			echo '<td>'.$usuario["id"].'</td>';
			echo '<td>'.$usuario["nome"].'</td>';
			echo '<td>'.$usuario["email"].'</td>';
			echo '<td><a href="editar.php?id="'.$usuario["id"].'>Editar</a></td>';
			echo '<td><a href="excluir.php?id="'.$usuario["id"].'>Excluir</a></td>';
			echo '</tr>';
		}
	}
  	?>
  </tbody>
</table>
</div>
</body>
</html>