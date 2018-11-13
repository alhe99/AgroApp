<?php 
    session_start();
    if(!isset($_SESSION['Admin'])) {
    header('Location: ./../index.php');
  }
    
 ?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet"  href="./jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <link rel="stylesheet"  href="./css/jquery.dataTables.min.css">
    <link rel="stylesheet"  href="./css/dataTables.bootstrap.min.css">
    <link rel="stylesheet"  href="./css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="./css/fontawesome-all.min.css">
    <link rel="stylesheet"  href="./css/material.min.css">

    <title>Panel de Administracion</title>
  </head>
  <body >
        <div class="container-fluid"> <!-- Contenerdor principal -->
          <div class="row">
            <div class="col-md-12" id="enca">
            
        </div>
      </div>
    </div>
          
          <div class="container-fluid">
          <div class="row" id="NombreE"> 
                <div class="col-md-4 nombreH">
                  
                </div>
                  <div class="col-md-4 nombreH" style="text-align: center;">
                       <h4 id="tletra"><em><center><strong>AGROSERVICIO &nbsp;&nbsp;&nbsp;EL &nbsp;&nbsp;&nbsp;RANCHITO</strong></center></em></h4>
                  </div>
                  <div class="col-md-4 nombreH">
                    <?php if(isset($_SESSION['Admin'])){  ?>
                <h6 style="color: white;"><strong>Bienvenido/a Administrador: &nbsp;</strong> <?php echo $_SESSION['Admin']; ?></h6>
                <a href="php/logout_Admi.php" class="btn btn-primary">Cerrar Sesion</a>
                  <?php 
                    }else{
                   ?>
                  
                   
                   <?php } ?>
                  </div>
                 
            
          </div>
        
           <!-- inicio de div para nav -->
           <div id="nav" > <!-- inicio de div para nav -->
      <div class="row">
      <nav class="navbar col-md-12 navbar-expand-lg navbar-dark bg-dark">
      
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link externo" href="./index.php">Incio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./php/productos.php">Administracion de Contenido</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./php/quienes_somos.php">Quienes Somos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./php/ubicacion.php">Ubicacion</a>
        <?php if(isset($_SESSION['user'])){ ?>
        <li class="nav-item">
        <a class="nav-link" href="./php/quienes_somos.php">Quienes Somos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./php/quienes_somos.php">Quienes Somos</a>
      </li>
      <?php } ?>
      </li>

      </ul>
      
 

  <div class="row" > <!--Para cargar otras pag en php -->
  <div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro para realizar cotizacion de productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form id="fAddRegistro">
          <input type="hidden" name=" " value=" ">
          <div>
            <label>Nombre:</label>
              <input class="col-md-12 col-md-2 form-control" type="text" name="" value="">
          </div>
          <br>
           <div class="form-group">
            <label>Email</label>
                <label class="sr-only col-md-12 col-md-2" for="exampleInputEmail2">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Ingrese correo" required>
            </div>
          <div>
            <label>Contraseña</label>
              <input class="col-md-12 col-md-2 form-control" type="text" name="" value="" required>
          </div>
          <div>
            <label>Confirme contraseña:</label>
              <input class="col-md-12 col-md-2 form-control" type="text" name="" value="">
          </div>
          <br>
          <div align="center">
              <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Registrar</button>
            </div>
          </form>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
  </div>
</div>



    
  </div>
</nav>
 </div>
 </div>
        
          
<div class="container-fluid" > <!--Para cargar otras pag en php -->
  <div class="container col-md-12 col-md-2" id="contenido" style="color: black;" >
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <h2 id="te"><center><strong>Bienvenido/a al espacio <br> administrativo del <br> Agroservicio El Ranchito!!</strong></center></h2>
  </div>
</div>
<div class="container col-md-12" id="footer" style="margin-top: -10px; height: 50px; padding: 20px;"> <!--Para cargar otras pag en php -->
  <p>Todos los Derechos Reservados &copy;</p>
         </div>
      </div>
  </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="./jquery-ui/jquery-ui.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/scripts.js"></script>
    <script src="./js/datatables.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap.min.js"></script>
    <script src="./js/dataTables.responsive.min.js"></script>
    <script src="./js/dataTables.material.min.js"></script>
    <script src="./js/fontawesome-all.min.js"></script>
  </body>
</html>