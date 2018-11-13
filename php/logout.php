<?php 
	session_start();
	unset($_SESSION['usuario']);
	unset($_SESSION['idcliente']);
	unset($_SESSION['productos']);
	unset($_SESSION['item']);
	session_destroy();
	header('Location: ../index.php');
?>