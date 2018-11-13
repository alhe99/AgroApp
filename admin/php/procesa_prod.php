<?php 
require_once('./conexion.php');
$opcion = $_POST['opc'];

if($opcion=='new' || $opcion== 'upd'){
	$nombre =$_POST['nombre'];
	$precio =$_POST['precio'];
	$fechave = $_POST['fechave'];
	$descripcion = $_POST['descripcion'];
	$imagen = uniqid()."-".$_FILES['imagen']['name'];
	$categoria = $_POST['categoria'];
}


switch ($opcion) {
	case 'new': 
	$sql_existe = "select nombre from productos where nombre = '$nombre' ";
	$resultado = $connect->query($sql_existe);
	$records = mysqli_num_rows($resultado);
	if($records>0){
		echo "Ya existe un productos con este nombre registrado en la base de datos.Verifique";
	}else{
				
					$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
					$limite_kb = 500;

					if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
					{	
						$ruta = $_SERVER['DOCUMENT_ROOT']."/AppAgro/images/resource_img/".$imagen;
							$resultado = move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
							if ($resultado){
								$sql = "insert into productos(nombre,precio,fechavenci,descripcion,imagen,idcate) values ('$nombre','$precio','$fechave','$descripcion','$imagen','$categoria')";
								$resultado = $connect->query($sql);
								if($resultado){
									echo "Producto agregado correctamente";
								}else{
									echo "Error al guardar el registro, favor verifique todos los campos nuevamente";
								}
					
							} else {
								echo "ocurrio un error al subir la imagen.";
							}
					} else {
						echo "archivo no permitido, es tipo de archivo no es imagen o excede el tamaño permitido por el sistema";
					}
				

				}
			break;
	case 'del':
	$id = $_POST['id'];
	$stmt = $connect->stmt_init();
	$stmt->prepare("delete from productos where id = ?");
	$stmt->bind_param('i',$id);
	if($stmt->execute()){
		echo "El registro del producto ha sido eliminado exitosamente";
	}else{
		echo "Error al intentar Eliminar el registro del producto";
	}
		break;
		
		default:
			# code...
	
		break;
	}

 ?>