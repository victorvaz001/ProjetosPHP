<?php
$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "root";
$dbpass = "root"

try{
	$pdo = new PDO($dsn, $dbuser, $dbpass);
	echo "Conecou com sucesso ao banco de dados!";
}catch(PDOException $e){
	echo "Falha na conexão com o banco de dados ".$e->getMessage();
}
?>