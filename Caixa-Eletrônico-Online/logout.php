<?php
session_start();
unset($_SESSION['userbanco']);
header("Location: login.php");
?>