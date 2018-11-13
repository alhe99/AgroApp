
<?php 
session_start();
	require_once('./conexion.php');

	$id = $_POST['id'];

	$consulta = "select id,nombre,precio,descripcion,imagen from productos where idcate LIKE $id order by nombre";
	$resultado = $connect->query($consulta);
	$records = mysqli_num_rows($resultado);
	$fila = mysqli_fetch_assoc($resultado);
	if($records>0){
?>
<div class="row" >

			<?php do{ ?>
			<div class="col-md-3 card-group" style="margin-left: 0px;">
				
			<div class="card  mb-3 border-dark ">
				
				<a class="externo" href="./images/resource_img/<?php echo $fila['imagen']; ?>" target="_blank" ><img class="img-responsive card-img-top " src="./images/resource_img/<?php echo $fila['imagen']; ?>" style="width: 50%;display: block;margin-left: auto;margin-right: auto; margin-top: 4px;"></a>
				
						   <div class="card-header bg-transparent">
						   	<h5 class="text-center"><strong><?php echo $fila['nombre']; ?></strong></h5>
						   	<h6 class="text-center"><strong><?php echo 'Precio: '.'$'.$fila['precio']; ?></strong></h6>

					
					<?php if(isset($_SESSION['productos'])){ ?>	
                    <div class="dropdown-divider"></div>
                	<button type="button" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#modalCot<?php echo $fila['id'];?>">Cotizar Producto</button>


            <!-- inicio del formulario modal para especificar cantidad -->
                <!-- Modal -->
					<div class="modal fade" id="modalCot<?php echo $fila['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content ">
					      <div class="modal-header  col-md-12">
					       
					        <h5 class="modal-title " id="myModalLabel">Agregar productos a la Cotización</h5>
					      </div>
					      <div class="modal-body" style="margin-left:5px;margin-right:5px">
					         <form class="form-horizontal" id="formItemCoti<?php echo $fila['id'];?>" method="post">
					         	<input type="hidden" name="idprod" id="idprod" value="<?php echo $fila['id']; ?>">
					         	<div class="form-group">
					         		<label><strong>Cantidad:</strong></label>
					         		<div>
					         			<input type="number" class="form-control" name="cantidad" id="cantidad" value="1" min="1">
					         		</div>
					         	</div>
					         	<div class="form-group">
					         		<label><strong>Producto:</strong></label>
					         		<div>
					         			<label><?php echo $fila['nombre'].' '.$fila['descripcion']; ?></label>
					         		</div>
					         	</div>
					         	<div class="form-group">
					         		<label><strong>Precio:</strong></label>
					         		<div>
					         			<label>$<?php echo $fila['precio']; ?></label>
					         		</div>
					         	</div>
					         </form>
					      </div>
					      <div class="modal-footer">
					       
					        <button type="button" class="btn btn-primary" onclick="addItemCoti(<?php echo $fila['id']; ?>)">Agregar a la Cotización</button>
					         <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-cerrar">Cerrar</button>
					      </div>
					    </div>
					  </div>
					</div>

                <!-- fin del form modal -->
                
                	<?php } ?>		
						   	<div class="dropdown-divider"></div>
						   </div>
				<div class="card-body text-secondary bg-transparent">
			    <p class="card-text text-center text-justify"><?php echo $fila['descripcion']; ?> </p>
				</div>
			</div>
             
         </div>
			<?php }while($fila=mysqli_fetch_assoc($resultado)) ?>
		</div>

	</div>
	<?php	}else{
		?>
		<div class="alert alert-dark" role="alert">
		  No hay productos añadidos a esta categoria!
		</div>


		<?php 
			}

		 

	
