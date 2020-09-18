<?php
session_start();
require 'config.php';

if(isset($_SESSION['userbanco']) && !empty($_SESSION['userbanco'])){
    $id = $_SESSION['userbanco'];

    $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");
    $sql->bindValue(":id", $_SESSION['userbanco']);
    $sql->execute();

    if($sql->rowCount() > 0){
      $info = $sql->fetch();
    }

} else {
  header("Location:login.php");
  exit;
}

?>
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
	<title>Caixa Eltrônico onlinie</title>
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
          <?php echo $info['titular']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="logout.php" onclick="return confirm('Sair do sistema')">Sair</a>
        </div>
      </li>
  </ul>
  </div>
</nav>
<br/>
	<h2>Caixa Eletrônico Online</h2><br/>

<div class="card-deck">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><i class="fa fa-user"></i> Titular: <?php echo $info['titular']; ?></h5>
      <p class="card-text"></p>
      <p class="card-text"></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><i class="fa fa-university"></i> Agência: <?php echo $info['agencia']; ?></h5>
      <p class="card-text"></p>
      <p class="card-text"></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"> Conta: <?php echo $info['conta']; ?></h5>

      <p class="card-text"></p>
      <p class="card-text"></p>
    </div>
  </div>
    <div class="card">
    <div class="card-body">
      <h5 class="card-title"> Saldo: R$ <?php echo $info['saldo']; ?></h5>
      <p class="card-text"></p>
      <p class="card-text"></p>
    </div>
  </div>
</div>
<br/>
<a href="add-transacao.php"class="btn btn-primary">Adicionar Transação</a><br/><br/>

<h3>Histórico de Transações</h3>
<table class="table table-sm" style="text-align: center;">
  <thead>
    <tr>
      <th scope="col">Id:</th>
      <th scope="col">Data:</th>
      <th scope="col">Valor:</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = $pdo->prepare("SELECT * FROM historico WHERE id_conta = :id_conta");
      $sql->bindValue(":id_conta", $id);
      $sql->execute();

      if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $dado){
            ?>
            <tr>
              <th><?php echo $dado['id']; ?></th>
              <td><?php echo date('d/m/Y H:i', strtotime($dado['data_operacao'])); ?></td>
              <td>
                <?php if($dado['tipo'] == '0'): ?>
                  <font color="green">R$ <?php echo $dado['valor']; ?></font>
                  <?php else: ?>
                  <font color="red">-R$ <?php echo $dado['valor']; ?></font>
                <?php endif;?>
              </td>
            </tr>
            <?php
        }
      }
    ?>

  </tbody>
</table>

<div class="card text-center">
<div card-footer text-muted>
  <p><img src="img/user.jpg" width="30" height="30"> Victor Gonçalves Vaz | <img src="img/email.png" width="30" height="30"> victorvaz001@gmail.com |
   <a href="https://github.com/victorvaz001/ProjetosPHP" target="_blank"><img src="img/github.png" width="30" height="30"> Meu Git/Hub</a> </p>
 
</div>
</div>

</div>


</body>
</html>