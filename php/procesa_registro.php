<?php 
	require_once('./conexion.php');
    $opcion = $_POST['opc'];

	if($opcion=='new'){
		$nombre = $_POST['nombre'];
		$correo = $_POST['correo'];
		$clave = $_POST['pass'];
		

	}
	switch ($opcion) {
		case 'new':
			$sql_existe = "select nombre from usuarios where correo = '$correo'";
			$resultado = $connect->query($sql_existe);
			$records = mysqli_num_rows($resultado);
			if($records>0){
				echo "Ya existe un registro de usuario con este nombre o correo. verifique";
			}else{
				$sql = "insert into usuarios(nombre,correo,clave,idtipo) values ('$nombre','$correo',md5('$clave'),2)";
				$result = $connect->query($sql);
				if($result){
					echo "Usuario registrado correctamente";
				}else{
					echo "Error al registrar el usuario";
				}
			}
			break;
		
		default:
			# code...
			break;
	}
 ?>