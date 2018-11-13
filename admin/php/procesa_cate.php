<?php 
require_once('./conexion.php');

$opcion = $_POST['opc1'];


if($opcion=='new' || $opcion== 'upd'){
	$nombre =$_POST['nombre'];
}

switch ($opcion) {
	case 'new': 
	$sql_existe = "select categoria from categorias where categoria = '$nombre'";
	$resultado = $connect->query($sql_existe);
	$records = mysqli_num_rows($resultado);
	if($records>0){
		echo "La Categoria que desea registrar ya se encuentra almacenado en la base de datos";
	}else{
		$sql = "insert into categorias(categoria) values ('$nombre')";
		$resultado = $connect->query($sql);
		if($resultado){
			echo "Categoria Registrada Correctamente";
		}else{
			echo "Error al guardar el registro";
		}
	}
		break;
	default:
		break;
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