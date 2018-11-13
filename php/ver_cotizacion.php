<?php 
   session_start();
   require_once('./conexion.php');	
   if(count($_SESSION['productos'])>0){
?>   
   <table class="table table-striped table-dark">
  		<tr>
  			<td colspan="2"><strong>Cliente:</strong><?php echo ' '.$_SESSION['usuario']; ?></td>
  			<td colspan="3"> <strong>Fecha:</strong><?php echo "  ".date('d-m-y'); ?></td>
  		</tr>
  		<tr>
  			<td colspan="5" class="text-center">
  				Detalle de Cotización
  		</tr>
  		<tr>
  			<th>Producto</th>
  			<th>Cantidad</th>
			<th>Precio</th>
  			<th>SubTotal</th>
		</tr>	
		
			<?php 
			   $total=0;
			   for ($i=0; $i <count($_SESSION['productos']) ; $i++) { 
			   	# code...
			   	?>
			   	<tr>
				   	<td><?php echo $_SESSION['productos'][$i][2]; ?></td>
				   	<td class="text-center"><?php echo $_SESSION['productos'][$i][1]; ?></td>
				   	<td class="text-center"><?php echo '$'.$_SESSION['productos'][$i][3]; ?></td>
				   	<td class="text-center"><?php echo '$'.$_SESSION['productos'][$i][4]; ?></td>
				   	<td>

				   		<button type="button" class="btn btn-info" title="Remover Producto de la Cotización" onclick="eliminarCoti(<?php echo $i; ?>)"><i class="fa fa-times" aria-hidden="true"></i></button>


				   		
				   	</td>
				<?php   	
					$total += number_format($_SESSION['productos'][$i][4],2,'.',' ');
				?>	
				</tr>
			<?php	
			   }
			?>
			<tr>
				<td colspan="3"><strong>Total de la Cotización:</strong></td>
				<td class="text-right"><?php echo '$'.$total; ?></td>
			</tr>
			<tr>
				<td colspan="5" align="right">
					<button type="button" class="btn btn-success" onclick="confirmarCoti(<?php echo $total; ?>)">Confirmar Cotización</button>
				<a href="./php/pdf_coti.php" class="btn btn-success">Exportar Cotización a PDF</button>	

					
				</td>
				
			</tr>
   </table>
 <?php }else{ ?>
<div class="alert alert-primary" role="alert">
 No hay productos agregados al apartado de cotizaciones...!
</div>

 <?php } ?>  
