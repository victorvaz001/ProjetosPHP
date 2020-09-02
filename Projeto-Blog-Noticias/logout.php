<?php
session_start();
require 'config.php';

if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){

	session_destroy();
	header("Location: index.php");
}
?>