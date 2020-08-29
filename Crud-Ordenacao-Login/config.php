<?php
try{
	$pdo = new PDO("mysql:dbname=projeto_escolar;host=localhost", "root", "root");
}catch(PDOException $e){
	echo "FALHA: ".$e->getMessage();
}
?>