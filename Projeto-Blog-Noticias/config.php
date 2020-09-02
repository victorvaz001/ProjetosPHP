<?php
try{
	$pdo = new PDO("mysql:dbname=blog_noticias;host=localhost", "root", "root");
}catch(PDOException $e){
	echo "FALHA: ".$e->getMessage();
}
?>