<?php
session_start();
require 'config.php';

if(isset($_GET["ordem"]) && !empty($_GET["ordem"])){

      $ordem = addslashes($_GET["ordem"]);
      $sql = "SELECT * FROM aluno ORDER BY ".$ordem;
} else {
      $ordem = "";
      $sql = "SELECT * FROM aluno";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema PHP - CRUD - MySQL - Ordenação - Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #f5f5f5;">
	 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm sticky-top">
	<h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php"
		style="text-decoration: none;">CRUD</h5></a>
 
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="index.php">Home</a>
    <a class="p-2 text-dark" href="adduser.php">New User</a>
    <?php
      if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){

          $nome = $_SESSION["nome"];

          echo '<a href="index.php"> Hello '.$nome.'</a>';
      } else {
        header("Location: login.php");
      }
    ?>
     

  </nav>
 <a class="btn btn-outline-primary" data-toggle="modal" data-target="#staticBackdrop"href="logout.php" onclick="return confirm('Finalizar sessão?');">Logout</a>



</div>


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h2 class="display-5">PHP - MySQL - Bootstrap</h2>
    <p class="lead">  
   </p>
</div>
 
<div class="container">



   <a href="adduser.php" class="btn btn-primary">New User</a><br/><br/>

   <form method="GET">

    <label for="exampleFormControlSelect1">Filter</label>
    <select class="form-control" name="ordem" onchange="this.form.submit()">
      <option></option>
      <option value="nome" <?php echo ($ordem=="nome")?'selected="selected"':''?>>For name</option>
      <option value="idade" <?php echo ($ordem=="idade")?'selected="selected"':''?>>For age</option>
      <option value="sexo" <?php echo ($ordem=="sexo")?'selected="selected"':''?>>For Sex</option>
    </select>

   </form>
<br/><br/>

 <table class="table" style="text-align: center;">

  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Age</th>
      <th scope="col">Sex</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <?php
    
      $sql = $pdo->query($sql);

    if($sql->rowCount()> 0){
      foreach($sql->fetchAll() as $usuario):
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $usuario["id"]; ?></th>
      <td><?php echo $usuario["nome"]; ?></td>
      <td><?php echo $usuario["email"]; ?></td>
      <td><?php echo $usuario["idade"]; ?></td>
      <td><?php echo $usuario["sexo"]; ?></td>
      <td><?php echo '<a href="updateuser.php?id='.$usuario["id"].'" class="btn btn-outline-info">Update</a>'?></td>

      <td onclick="return confirm('Confirmar Exclusão?');"><?php echo '<a href="deleteuser.php?id='.$usuario["id"].'" class="btn btn-outline-danger">Delete</a>'?></td>
    </tr>
  </tbody>
  <?php
    endforeach;
  }
  ?>
</table>
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
</body>

</script>

</html>