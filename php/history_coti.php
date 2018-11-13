<?php 
session_start();
require_once('./conexion.php');

$user = $_SESSION['idcliente'];
$consulta = "select p.nombre,p.descripcion,p.precio,dc.cantidad,p.precio*dc.cantidad as SubTotal,c.fecha from productos p INNER JOIN detacotiza dc on p.id=dc.idprod INNER JOIN cotizacion c on dc.idcotiza = c.id where c.idusuario = $user";
$resultado = $connect->query($consulta);
$records = mysqli_num_rows($resultado);
$fila = mysqli_fetch_assoc($resultado);
if($records > 0){
 ?>
  <table class="table table-striped table-dark "  >
  		<tr>
  			<td colspan="6"><strong>Cliente:</strong><?php echo ' '.$_SESSION['usuario']; ?> </td>
  		</tr>
  		<tr>
  			<td colspan="6" class="text-center">
  				<strong>HISTORIAL DE COTIZACIONES REALIZADAS</strong>
  		</tr>
  		<tr>
  			<th>Productos:</th>
  			<th>Fecha de Cotización</th>
  			<th>Descripcion de producto:</th>
  			<th>Cantidad:</th>
			<th>Precio:</th>
  			<th>Total:</th>
		</tr>	
		
			<?php 
			   do{
			   	?>
			   	<tr>
				   	<td><?php echo $fila['nombre']; ?></td>
				   	<td><?php echo $fila['fecha']; ?></td>
				   	<td ><?php echo $fila['descripcion']; ?></td>
				   	<td class="text-center"><?php echo $fila['cantidad']; ?></td>
				   	<td><?php echo '$'. $fila['precio']; ?></td>
				   	<td><?php echo '$'. $fila['SubTotal']; ?></td>
				</tr>
			<?php	
			   } while ($fila = mysqli_fetch_assoc($resultado));
			?>
			
   </table>

 <?php }else{ ?>
 	<div class="alert alert-primary" role="alert">
 No existe Registro de Cotizaciones en base de datos...!
</div>
 <?php } ?>  
<div id="show">
	
</div>