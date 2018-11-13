<?php 
	session_start();
	require_once('./conexion.php');
	if (isset($_POST['email']) && isset($_POST['clave'])) {
		$user = $_POST['email'];
		$pass = $_POST['clave'];
		$sql = "select id,nombre,correo,clave from administrador where correo ='$user' and clave =md5('$pass')";
		$resultado= $connect->query($sql);
		$fila = mysqli_fetch_assoc($resultado);
		$r = mysqli_num_rows($resultado);

		

		
		
		if($r>0){
			$_SESSION['useid'] = $fila['id'];
			$_SESSION['userad'] = $fila['correo'];
			$_SESSION['usu'] = $fila['nombre'];
			$_SESSION['usua'] = array();
			$_SESSION['item'] = 0;
			echo "";
		}else{
			echo "Contraseña o correo incorrectos o sin acceso";
		} 
	}
 ?>