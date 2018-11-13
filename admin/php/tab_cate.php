<?php 
  require_once('./conexion.php');

  $sqlcat = "select id,categoria from categorias";
  $result_cat = $connect->query($sqlcat);
  $cate = mysqli_fetch_assoc($result_cat);
 ?>
<table class="table table-bordered table-responsive" id="tablaCate">
				  <thead>
				    <tr>
				      <th>ID</th>
				      <th>Categoria</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				    <?php do{ ?>
				    <tr>
				      <td><strong><?php echo $cate['id'] ?></strong></td>
				      <td><?php echo $cate['categoria'] ?></td>
				      <td>
				        <button type="button" class="btn btn-success" title="Editar Categoria" onclick="editCat(<?php echo $cate['id'] ?>)"><i class="far fa-edit fa-1x"></i></button>
				      </td>
				    </tr>
				    <?php } while ($cate = mysqli_fetch_assoc($result_cat)); ?>
				  </tbody>
				 </table>