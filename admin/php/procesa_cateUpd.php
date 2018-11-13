<?php 
require_once('./conexion.php');

$opcion = $_POST['opc2'];


if($opcion== 'upd'){
	$nombre =$_POST['nombreUpd'];
}

switch ($opcion) {
		case 'upd':
		$id = $_POST['id'];
	$stmt = $connect->stmt_init();
	$stmt->prepare("update categorias set categoria=? where id = ?");
	$stmt->bind_param('si',$nombre,$id);
	if($stmt->execute()){
		echo "Categoria Actualizada Correctamente";
	}else{
		echo "Error al intentar actualizar el registro";
	}
	
		break;
}

 ?>