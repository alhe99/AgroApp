<?php 
	session_start();
	require_once('./conexion.php');
	if(isset($_POST['opc'])){
		$total = $_POST['total'];
		$sql_corre = "SELECT CONCAT(TRIM(YEAR(CURDATE())),LPAD(TRIM(MONTH(CURDATE())),2,'0'),LPAD(IFNULL(max(TRIM(SUBSTRING(no_coti,7,4))),0)+1,4,0)) as correlativo FROM cotizacion where SUBSTRING(no_coti,1,6)=CONCAT(TRIM(YEAR(CURDATE())),LPAD(TRIM(MONTH(CURDATE())),2,'0'))";
		$resultado = $connect->query($sql_corre);
		$fila = mysqli_fetch_assoc($resultado);
		$num_coti = $fila ['correlativo'];

		$errores = 0;
		$idusuario = $_SESSION['idcliente'];
		$sqlcoti = "insert into cotizacion(no_coti,fecha,total,estado,idusuario) values ('$num_coti',curdate(),'$total','R','$idusuario')";
		$resultado2 = $connect->query($sqlcoti);
		if ($resultado2) {

			$idcoti = mysqli_insert_id($connect);

			for($i=0; $i <count($_SESSION['productos']) ; $i++){
				$cantidad = $_SESSION['productos'][$i][1];
				$idprod = $_SESSION['productos'][$i][0];
				$sqldetalle = "insert into detacotiza(cantidad,idcotiza,idprod) values('$cantidad','$idcoti','$idprod')";
				$resultado3 = $connect->query($sqldetalle);
				if(!$resultado3){
					$errores +=1;
				}
			}
			
		}else{
			$errores +=1;
		}
		if($errores == 0){
			echo "Cotizacion registrada correctamente";
		}else{
			echo "Ocurrio un error al guardar la cotizacion en la base de datos";
		}
	}

 ?>