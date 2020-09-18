<?php
try{
	$pdo = new PDO("mysql:dbname=projeto_caixaeletronico;host=localhost", "root", "root");
}catch(PDOEXception $e){	
	echo 'FALHA: '.$e->getMessage();
}
?>