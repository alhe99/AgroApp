<?php 
require_once('./conexion.php');

  $filtro = "";
  if(isset($_POST['filtro'])){
    $filtro = $_POST['filtro'];
   

  }
  $consulta = "select p.id,p.nombre,p.precio,p.fechavenci,p.descripcion,c.categoria,p.imagen from productos p INNER JOIN categorias c on p.idcate = c.id  where nombre LIKE '%".$filtro."%' order by id desc";
  $resultado = $connect->query($consulta);
  $records = mysqli_num_rows($resultado);
  $fila = mysqli_fetch_assoc($resultado);
  if($records >0){
 ?>
 <table class="tablaP table-responsive" id="prods">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Fecha Vencimiento</th>
      <th>Descripción</th>
      <th>Categoria</th>
      <th>Imagen Producto</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php do{ ?>
    <tr>
      <td><strong><?php echo $fila['id'] ?></strong></td>
      <td><?php echo $fila['nombre'] ?></td>
      <td><?php echo $fila['precio'] ?></td>
      <td><?php echo $fila['fechavenci'] ?></td>
      <td><?php echo $fila['descripcion'] ?></td>
      <td><?php echo $fila['categoria'] ?></td>
      <td>
      <a href="../images/resource_img/<?php echo $fila['imagen']; ?>" target="_blank" ><img src="./../images/resource_img/<?php echo $fila['imagen']; ?>" style="width: auto; height: 100px;"></a></td>
      <td>
        <button type="button" class="btn btn-info" title="Eliminar Información de Producto" onclick="deleteProd(<?php echo $fila['id'] ?>)"><i class="far fa-trash-alt fa-1x"></i></button>
        <button type="button" class="btn btn-success" title="Editar Producto"  onclick="editProd(<?php echo $fila['id'] ?>)"><i class="far fa-edit fa-1x"></i></button>
      </td>
    </tr>
    <?php } while ($fila = mysqli_fetch_assoc($resultado)); ?>
  </tbody>
 </table>
  <?php 
  }
  else echo '<h4> No se encontraron coincidencias</h4>';
   ?>
<?php 
  if($reg = mysqli_fetch_array($resultado)){
  ?>
       <?php
        }
       ?>
   <script>
     $(document).ready(function(){
      var idioma = {
  "sProcessing":     "Procesando...",
  "sLengthMenu":     "Mostrar _MENU_ registros",
  "sZeroRecords":    "No se encontraron resultados",
  "sEmptyTable":     "Ningún dato disponible en esta tabla",
  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
  "sInfoPostFix":    "",
  "sSearch":         "Buscar:",
  "sUrl":            "",
  "sInfoThousands":  ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
  },
  "oAria": {
    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  }
}
      $('.tablaP').DataTable({
        language: idioma,
        "searching": true,
        responsive: true

      });

    

     });
   </script>






    