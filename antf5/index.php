<?php
	#############################################################
	/*Projeto anti F5 + geração de arquivo txt*/
	if(isset($_POST['nome']))
	{
		$nome = $_POST['nome'];
		file_put_contents("teste.txt", $nome, FILE_APPEND);

		header("Location: index.php"); //não envia o formulairo caso eu aprte F5
	}

	phpinfo();
?>

	<form method="POST">
		<input type="text" name="nome">
		<input type="submit" value="Enviar">
	</form>
