<?php 
  require_once('./conexion.php');
  $id = $_POST['id'];

  $sql = "select id,categoria from categorias where id = $id";
    $resultado= $connect->query($sql);

  if($reg = mysqli_fetch_array($resultado)){
  ?>
          <form class="form-horizontal" id="fActCate" >
                      <input type="hidden" name="opc2" value="upd">
                      <input type="hidden" name="id" value="<?php echo $reg['id']; ?>">
        
                   
                    <div class="col form-group">
                    <label for="">Nombre de Categoria:</label>
                     <input type="text" name="nombreUpd" id="nombreUpd" class="form-control" value="<?php echo $reg['categoria']; ?>">
                     <br>
                <button type="button" onclick="ActCate()"  class="btn btn-outline-primary">Actualizar</button>
                <input type="button" onclick="back()" name="Cancelar" value="Cancelar" class="btn btn-outline-danger">

                    </div>
                </form>

                        <script>
                          function back(){
                            $("#collapseExample").reset();
                          }
                        </script>
                    
                        <?php
                        }
                        ?>