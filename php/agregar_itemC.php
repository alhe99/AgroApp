<?php 
	session_start();
	require_once('./conexion.php');
	
	if(isset($_POST['idprod']) && isset($_POST['cantidad'])){
		$idprod = $_POST['idprod'];
		$cantidad = $_POST['cantidad'];
	
		$consulta = "select CONCAT(nombre,', ',TRIM(descripcion)) as producto,nombre as NombreProd,precio,descripcion from productos where id = $idprod";

		$resultado = $connect->query($consulta);
		$fila = mysqli_fetch_assoc($resultado);
	
		$_SESSION['productos'][$_SESSION['item']][0] = $idprod;
		$_SESSION['productos'][$_SESSION['item']][1] = $cantidad;
		$_SESSION['productos'][$_SESSION['item']][2] = $fila['producto'];
		$_SESSION['productos'][$_SESSION['item']][3] = $fila['precio'];
		$_SESSION['productos'][$_SESSION['item']][4] = $fila['precio']*$cantidad;
		$_SESSION['productos'][$_SESSION['item']][5] = $fila['descripcion'];
		$_SESSION['productos'][$_SESSION['item']][6] = $fila['NombreProd'];
		$_SESSION['item']++;
		$resultado = "Producto agregado a la cotización";
		echo $resultado;
		
	}
 ?>