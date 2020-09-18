<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>



	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

	<!--icons -->
	<script src="https://use.fontawesome.com/99dac69e8e.js"></script>
	<title></title>
</head>
<body>

<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><i class="fas fa-dollar-sign"></i> Caixa Eletrônico Online</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add-transacao.php">Add-Transção</a>
      </li>
    </ul>
    <ul class="list-inline">
         <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="logout.php" onclick="return confirm('Sair do sistema')">Sair</a>
        </div>
      </li>
  </ul>
  </div>
</nav>
<br/>
	<h2>Fazer uma transação</h2><br/>

<form method="POST">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Escolha uma opção</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option value="0">Depositar</option>
      <option value="1">Sacar</option>
    </select>
  </div>
  <div class="form-group">
    <label for="valor">Valor</label>
    <input type="number" class="form-control" id="valor" name="valor" placeholder="Informe um valor">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="index.php" type="submit" class="btn btn-danger" onclick="return confirm('Cancelar Transação?')">Cancelar</a><br/>
</form>
<br/>
<div class="card text-center">
<div card-footer text-muted>
  <p><img src="img/user.jpg" width="30" height="30"> Victor Gonçalves Vaz | <img src="img/email.png" width="30" height="30"> victorvaz001@gmail.com |
   <a href="https://github.com/victorvaz001/ProjetosPHP"><img src="img/github.png" width="30" height="30"> Meu Git/Hub</a> </p>
 
</div>
</div>

</div>


</body>
</html>