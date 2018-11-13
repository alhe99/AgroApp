<?php 
	session_start();
	require_once('./conexion.php');

	$sqlcat = "select id,categoria from categorias";
    $result_cat = $connect->query($sqlcat);
  	$cate = mysqli_fetch_assoc($result_cat);

	?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Productos</title>
	<script>
		$(document).ready(function(){
			$ ('.selectpicker ' ) . selectpicker ( ) ;

		});
		//funcion de busqueda por nombre de producto
		$('#filtro').keyup(function(){
				var dato = $('#filtro').val();
				$.ajax({
					type:'POST',url: './php/prod_sect.php',data:('filtro=' + dato),success:function(resp){
						if(resp != ""){
							$('#show').html(resp);
						}
					}
				});
			});
		$("#show").load('./php/prod_sect.php');
	</script>

</head>
<body>
<div class="table-responsive" >
		<form >
			<table class="table table-bordered">
				<tbody>
					<tr>
                 <td> <input class="form-control" placeholder="Buscar Productos..." name="filtro" id="filtro" type="text" onkeypress="return(event.charCode >= 65 && event.charCode <=90) || 
                                  (event.charCode >= 97 && event.charCode <=122) || 
                                  event.charCode == 32 || 
                                   (event.charCode >=160 && event.charCode <= 165)" maxlength = "80"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<div class="row" >
		<div class="col-md-3" >
	<div class="list-group" id="list-tab" role="tablist">

      
		

			<div id="list-example" class="list-group">
				<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home" style="color: #fff; background: gray;">Categorias de Productos</a>
				 <?php  do{ ?>
          <a onclick="SearchCate(<?php echo $cate['id']; ?>)" class="list-group-item list-group-item-action" >&raquo;<?php echo $cate['categoria']; ?></a>
 			<?php }while ($cate = mysqli_fetch_assoc($result_cat));?>
</div>

    </div>
		</div>
		<div class="col-md-9" id="show">
			
		</div>
	</div>
	

</body>
</html>


