<?php
session_start();
require 'config.php'
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema PHP - CRUD - MySQL - Ordenação - Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #f5f5f5;">
	 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
	<h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php"
		style="text-decoration: none;">CRUD</h5></a>
 
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="index.php">Home</a>
    <a class="p-2 text-dark" href="adduser.php">New User</a>
      <a href="index.php">Olá fulano</a>

  </nav>
 <a class="btn btn-outline-primary" href="logout.php">Logout</a>


 
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h2 class="display-5">PHP - MySQL - Bootstrap</h2>
    <p class="lead">  
   </p>
</div>
 
<div class="container">

   <a href="adduser.php" class="btn btn-primary">New User</a><br/><br/>

   <form method="GET">
    
    <label for="exampleFormControlSelect1">Filtrar</label>
    <select class="form-control " id="exampleFormControlSelect1">
      <option></option>
      <option>For name</option>
      <option>For age</option>
      <option>For Sex</option>
    </select>
   </form>
<br/><br/>

 <table class="table">

  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
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
</html>