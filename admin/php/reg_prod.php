<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de Productos</title>
</head>
<body>
  <div id="titulo">
      <h3><em>Registro de Productos</em></h3>
  </div>
  <form class="form-horizontal" id="fRegProd" enctype="multipart/form-data">
    <input type="hidden" name="opc" value="new">
    <div class="form-group col-xs-12 col-md-6" id="estilo">
    <label for="">Nombre de Producto</label>
    <input type="text" class="form-control" id="nombre" placeholder="Nombre Producto" name="nombre" >
        </div>
       <div class="form-group" id="pestilo">
        <label for="" class="col-xs-3 col-md-2 col-form-label">Precio de Producto</label>
        <div class="input-group col-xs-9 col-md-4">
          <div class="input-group-prepend" id="estilo">
            <span class="input-group-text">$</span>
          </div>
      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="precio" name="precio" >
      <div class="input-group-append" id="destilo" >
        <span class="input-group-text">.00</span>
      </div>
    </div>
  </div>
  <div class="form-group col-xs-12 col-md-6" id="festilo">
    <label for="">Fecha de Vencimiento</label>
    <input type="date" class="form-control" id="fechave" name="fechave">
        </div>
        <div class="form-group col-xs-12 col-md-6" id="deestilo">
    <label for="">Descripcion</label>
    <textarea row="2" name="descripcion" id="descripcion" name="descripcion" class="form-control"></textarea>
        </div>
        <div class="form-group" id="file">
    <label for="">Imagen Para Producto</label>
    <input type="file" class="form-control-file" name="foto">
  </div>
 <div class="form-group " id="cate">
        <label for="" class="col-xs-3 col-md-2 col-form-label">Categoria</label>
        <div class="col-xs-9 col-md-4">
          <select name="cliente" id="cliente" class="form-control">
            <option value="">
          </select>
        </div>
      </div>
  <button type="button" class="btn btn-primary" id="btn" onclick="saveProd()">Guardar</button>
  <button type="reset" class="btn btn-warning" id="btn2">Nuevo</button>
</form>
</body>
</html>