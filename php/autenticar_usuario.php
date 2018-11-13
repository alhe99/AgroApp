<?php 
	session_start();
	require_once('./conexion.php');
	if (isset($_POST['email']) && isset($_POST['clave'])) {
		$user = $_POST['email'];
		$pass = $_POST['clave'];
		$sql = "select id,nombre, correo, clave,idtipo from usuarios where correo ='$user' and clave =md5('$pass') and idtipo='2'";

		$resultado= $connect->query($sql);
		$fila = mysqli_fetch_assoc($resultado);
		$r = mysqli_num_rows($resultado);

		$sqlAdmi = "select id,nombre, correo, clave,idtipo from usuarios where correo ='$user' and clave =md5('$pass') and idtipo = '1'";
		$resultaAdmi = $connect->query($sqlAdmi);
		$filaAdmi = mysqli_fetch_assoc($resultaAdmi);
		$rAdmi = mysqli_num_rows($resultaAdmi);
		
		if($r>0){
			$_SESSION['usuario'] = $fila['nombre'];
			$_SESSION['idcliente'] = $fila['id'];
			$_SESSION['productos'] = array();
			$_SESSION['item'] = 0;
			echo "";
		}else if($rAdmi>0){
			
	        $_SESSION['Admin'] = $filaAdmi['nombre'];
		}else{
			echo "Contraseña o correo incorrectos o sin acceso";
		} 

		

	}
 ?>