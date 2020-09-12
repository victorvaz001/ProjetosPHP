<?php
try{
	$pdo = new PDO("mysql:dbname=projeto_registroporconvite;host=localhost", "root", "root");
}catch(PDOException $e){
	echo 'Falha: '.$e->getMessage();
}
?>