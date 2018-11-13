<?php 
	require_once('./conexion.php');
	$id = $_POST['id'];

	$sqlcat = "select id,categoria from categorias";
    $result_cat = $connect->query($sqlcat);
  	$cate = mysqli_fetch_assoc($result_cat);

	$sql= "select p.id,p.nombre,p.precio,p.fechavenci,p.descripcion,p.imagen,p.idcate,c.categoria from productos p inner join categorias c on p.idcate = c.id where p.id = $id";
	$resultado = $connect->query($sql);
	if($reg = mysqli_fetch_array($resultado)){
	?>
					<form class="form-horizontal" id="fActProd"  method="post" enctype="multipart/form-data">
                    	<input type="hidden" name="opc" value="upd">
                    	<input type="hidden" name="id" value="<?php echo $reg['id']; ?>">
                    <div class="form-group col-xs-12 col-md-12">
                        </div>

                      <div class="row" style="margin-left: 1px;">
                    <div class="col form-group">
                    <label for="">Nombre de Producto:</label>
                     <input type="text" name="nombrep" id="nombrep" class="form-control" value="<?php echo $reg['nombre']; ?>">
                    </div>
                        <div class="col ">
                    <label for="">Precio de Producto:</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text col-md-1">$</span>
                      <input type="text" name="preciop" id="preciop" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo $reg['precio']; ?>">
                          <span class="input-group-text ">.00</span>
                      </div>
                    </div>
                     </div>


                  <div class=" form-group">
                    <div class="col">
                      <label for="">Fecha de Vencimiento</label>
                      <input type="date" class="form-control" id="fechavep" value="<?php echo $reg['fechavenci']; ?>" name="fechavep">
                    </div>
                    
                        </div>

                        <div class="form-group col-xs-12 col-md-12">
                    <label for="">Descripcion</label>
                    <textarea row="2" name="descripcionp" id="descripcionp" name="descripcionp" class="form-control"><?php echo $reg['descripcion']; ?></textarea>
                        </div>

                        <div class="form-group">
                          <label for="" class="col-sm-2  col-sm-8 control-label">Cambiar Imagen de presentaciòn</label>
                          <div class="col-sm-6 col-md-12">
                            <input type="file" name="imagenp" id="imagenp" class="form-control"> <?php echo $reg['imagen']; ?></input>
                          </div>
                      </div>

                      
                      <div class="form-group " id="cate">
                        <label for="" class="col-xs-3 col-md-12 col-form-label">Actualizar Categoria</label>
                        <div class="col-xs-9 col-md-8">
                          <select name="categoriap" id="categoriap" class="form-control">
                            
                          <!--Recorriendo los arreglos de consulta para evitar la redundancia de datos a mostrar en el select-->
 							         <?php  do{  
                          if($reg['idcate']==$cate['id']){
                        ?>
 							            <option value="<?php echo $cate['id']; ?>" selected><?php echo $cate['categoria']; ?></option>}
                      <?php }else{ ?>
                            <option value="<?php echo $cate['id']; ?>"><?php echo $cate['categoria']; ?></option>}
                            <?php } ?>
                            <?php }while ($cate = mysqli_fetch_assoc($result_cat));?>
                          </select>
                        </div>
                      </div>
						
					
                    <div style="text-align: center;">
                <button type="button" onclick="ActProd()"  class="btn btn-outline-success">Actualizar</button>
                <input type="button" onclick="back()" name="Cancelar" value="Cancelar" class="btn btn-outline-success">

                    </div>
                    
                </form>

                        <script>
                        	function back(){
                        		$("#show").load('./php/consulta_prod.php');
                        	}

                         

                        </script>
                        	<div  id="show">
                        		
                        	</div>
                        	
                        <?php
                        }
                        ?>



