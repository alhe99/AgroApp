<?php 
	require_once('./conexion.php');

	$consulta = "select nombre,descripcion,imagen from productos order by rand() LIMIT 8";
	$resultado = $connect->query($consulta);
	$records = mysqli_num_rows($resultado);
	$fila = mysqli_fetch_assoc($resultado);
	if($records>0){
?>
<div class="row" >

			<?php do{ ?>
			<div class="col-md-3 card-group"  >
			<div class="card-deck">
			<div class="card  mb-3 border-dark " style="max-width: 18rem; ">
				<?php if($fila['imagen'] != null){ ?>
				<img class="img-responsive img-fluid text-center" src="./images/resource_img/<?php echo $fila['imagen']; ?>" style="width: 50%;display: block;margin-left: auto;margin-right: auto; margin-top: 4px;">
				<?php }else{ ?>	
							<img class="img-responsive rounded-bottom" src="./images/nodisponible.png" " style="width: 50%; display: block;margin-left: auto;margin-right: auto;height:25;" >
						 <?php } ?>
						   <div class="card-header bg-transparent">
						   	<h5 class="text-center"><strong><?php echo $fila['nombre']; ?></strong></h5>
						   </div>
				<div class="card-body text-secondary bg-transparent">
			    <p class="card-text text-center text-justify"><?php echo $fila['descripcion']; ?> </p>
				</div>
			</div>
             </div>
         </div>
			<?php }while($fila=mysqli_fetch_assoc($resultado)) ?>
		</div>

	</div>
	<?php	}else{
		
	}

 ?>