<?php 
	session_start();
	
	unset($_SESSION['userid']);
	unset($_SESSION['user']);
	unset($_SESSION['us']);
	unset($_SESSION['usu']);
	unset($_SESSION['item']);
	session_destroy();
	header('Location: ../index.php');
 ?>