<?php 
  require_once('./conexion.php');

  $sqlcat = "select id,categoria from categorias";
  $result_cat = $connect->query($sqlcat);
  $cate = mysqli_fetch_assoc($result_cat);
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<title>Document</title>
<script type="text/javascript">
    $(document).ready(function($){

        $('#fRegProd').on("submit",function(e){
            e.preventDefault();

            var formData = new FormData($('#fRegProd')[0]);
            var rep = "exito";
            var ruta = "./php/procesa_prod.php";
            $.ajax({
              url:ruta,
              type: "POST",
              data: formData,
              contentType:false,
              processData:false,
              success: function(result){
			alert(result);
			$("#fRegProd")[0].reset();
            $("#show").load('./php/consulta_prod.php');

              }

            });

        });
    });
 
     $(document).ready(function(){
     $("#show").load('./php/consulta_prod.php');
     $("#TC").load('./php/tab_cate.php');

     });

  </script>
</head>
<body>
	<div class="row table-responsive" id="tablaB"  style="margin-top: 5px;">
		<form id="fbuscar-client">
			<table class="table table-bordered">
				<tbody>
					<tr>
        <td><label><strong><em>Funciones de Administrador:</em></strong></label></td>
        <td><button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Administracion de Categorias para Productos </button> &nbsp;&nbsp;&nbsp;&nbsp; 
        <button type="button"  data-toggle="modal" data-target="#frmC"  class="btn btn-outline-info">Agregar Nuevas Categorias</button> &nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target=".bd-example-modal-lg">
  						Agregar Productos
						</button>
		
					</td>
						
					</tr>
				</tbody>
			</table>
				<!--Inicio de Collapse para la administracion de categorias-->
				</p>
				<div class="collapse" id="collapseExample">
				  <div class="card card-body">
				  	<div class="row">
				  		<div class="col" id="TC">	
				  
				  		</div>
				 <div class="col-md-8" id="EdiCate">
					
				</div>

				</div>
				</div>
				</div>
				<!--Fin de Collapse para la administracion de las categorias-->

<!--Formulario Para registro de categorias(modal)-->
      <div class="modal fade" id="frmC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registro de Nuevas Categorias</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<form class="form-horizontal" id="fRegCate" >
                  <input type="hidden" id="opc1" name="opc1" value="new">
                   
                    <div class="col form-group">
                    <label for="">Nombre de Categoria:</label>
                     <input type="text" name="nombre" id="nombre" class="form-control" onkeypress="return(event.charCode >= 65 && event.charCode <=90) || 
                                  (event.charCode >= 97 && event.charCode <=122) || 
                                  event.charCode == 32 || 
                                   (event.charCode >=160 && event.charCode <= 165)" maxlength = "80">

                    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" onclick="saveCate()"  class="btn btn-outline-primary">Registrar Categoria</button>
              
            </div>
        </form>
          </div>
        </div>
      </div>
  </div>
			<!--Fin de formulario para registro de categorias-->


			<!--Inicio de Formulario Modal Para el registro de los productos-->
		</form>
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="color: black;">>
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      <div class="modal-header col-md-12">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title col-sm-12 col-md-12" style="margin-left: 235px;">Datos del Producto</h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success text-center" id="exito" style="display:none;">
                                    
                                </div>
                                
                                 <form class="form-horizontal" id="fRegProd" method="post" enctype="multipart/form-data">
								    <input type="hidden" name="opc" value="new">
								    <div class="form-group col-xs-12 col-md-12">
								        </div>

									    <div class="row" style="margin-left: 1px;">
										<div class="col form-group">
										<label for="">Nombre de Producto:</label>
										 <input type="text" class="form-control col-md-12" id="nombre" placeholder="Nombre Producto" name="nombre" onkeypress="return(event.charCode <=90) || 
                                  (event.charCode >= 97 && event.charCode <=122) || 
                                  event.charCode == 32 || 
                                   (event.charCode >=160 && event.charCode <= 165)" maxlength = "80">
										</div>
								        <div class="col ">
										<label for="">Precio de Producto:</label>
										<div class="input-group-prepend">
									    <span class="input-group-text col-md-1">$</span>
									    <input type="text" class="form-control col-md-9" aria-label="Amount (to the nearest dollar)" id="precio" name="precio" onkeypress="return(event.charCode >= 48 && event.charCode <=57) || 
                                  event.charCode == 46" maxlength = "10" >
					            		<span class="input-group-text ">.00</span>
									    </div>
										</div>
										 </div>


								  <div class=" form-group">
								    <div class="col">
								    	<label for="">Fecha de Vencimiento</label>
								    	<input type="date" class="form-control" id="fechave" name="fechave">
								    </div>
								    
								        </div>

								        <div class="form-group col-xs-12 col-md-12">
								    <label for="">Descripcion</label>
								    <textarea row="2" name="descripcion" id="descripcion" name="descripcion" class="form-control"></textarea>
								        </div>

								        <div class="form-group">
								          <label for="" class="col-sm-2  col-sm-8 control-label">Imagen</label>
								          <div class="col-sm-6 col-md-12">
								            <input type="file" name="imagen" id="imagen" class="form-control">
								          </div>
								      </div>

								 <div class="form-group " id="cate">
								        <label for="" class="col-xs-3 col-md-12 col-form-label">Categoria</label>
								        <div class="col-xs-9 col-md-8">
								          <select name="categoria" id="categoria" class="form-control">
								            <?php  do{ ?>
								            <option value="<?php echo $cate['id']; ?>"><?php echo $cate['categoria']; ?></option>}
								            
								            <?php }while ($cate = mysqli_fetch_assoc($result_cat));?>
								          </select>
								        </div>
								      </div>
										<div style="text-align: center;">
								<button type="submit"  class="btn btn-outline-success" style="margin-top: -1px;">Guardar</button>
								<button type="button" class="btn btn-outline-danger " data-dismiss="modal">Cerrar</button>

										</div>
								</form>
                            </div>
                        </div><!-- /.modal-content -->
					    </div>
					  </div>
					</div>
				</div>
				<!--Fin del formulario modal para el registro de los productos-->
			<div class="dropdown-divider"></div>
	<div id="show" class="container-fluid col-md-12">
    
</div>

</body>
</html>