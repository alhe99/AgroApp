<?php 
require_once('./conexion.php');
$opcion = $_POST['opc'];

if($opcion== 'upd'){

 	$id = $_POST['id'];
	$nombre =$_POST['nombrep'];
	$precio =$_POST['preciop'];
	$fechave = $_POST['fechavep'];
	$imagen = uniqid()."-".$_FILES['imagenp']['name'];
	$categoria = $_POST['categoriap'];
	$descripcion = $_POST['descripcionp'];
	
}


switch ($opcion) {
	case 'upd':
		if ($_FILES["imagenp"]["error"] > 0){
					echo "ha ocurrido un error con la imagen, intente de nuevo";
				} 
				else{
					$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
					$limite_kb = 500;

					if (in_array($_FILES['imagenp']['type'], $permitidos) && $_FILES['imagenp']['size'] <= $limite_kb * 1024)
					{	
						$ruta = $_SERVER['DOCUMENT_ROOT']."/AppAgro/images/resource_img/".$imagen;
							$resultado = move_uploaded_file($_FILES["imagenp"]["tmp_name"], $ruta);

							if ($resultado){
								$sql = "update productos set nombre='$nombre', precio='$precio',fechavenci='$fechave',descripcion='$descripcion',imagen='$imagen',idcate=$categoria where id=$id ";
								$resultado = $connect->query($sql);
								if($resultado){
									echo "Producto Actualizado correctamente";
								}else{
									echo "Error al Actualizar el registro, favor verifique todos los campos nuevamente";
								}
					
							} else {
								echo "ocurrio un error al subir la imagen.";
							}
					} else {
						echo "archivo no permitido, es tipo de archivo no es imagen o excede el tamaño permitido por el sistema";
					}
				}
		default:
			# code...
	break;
	}

 ?>


