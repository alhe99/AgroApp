<?php 
  session_start();
  
 ?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet"  href="./css/dataTables.bootstrap.min.css">
    <link rel="stylesheet"  href="./css/responsive.bootstrap.min.css">
    <link rel="stylesheet"  href="./css/jquery.dataTables.min.css">
    <link rel="stylesheet"  href="./css/datatables.min.css">
    <link rel="stylesheet" href="./css/fontawesome-all.min.css">
    <link rel="stylesheet"  href="./jquery-ui/jquery-ui.min.css">
    <title>Bienvenido a Agroservicio-El-Ranchito</title>
   
   
   
  </head>
  <body>
   
      <div class="container-fluid">
  			 <div class="row"> 
  				<div class="col-md-12" id="enca">
  					
  			  </div>
  			 </div>
	    </div>
      <div class="container-fluid">
         <div class="row"> 
                <div class="col-md-4 nombreH">
                  
                </div>
                  <div class="col-md-4 nombreH" style="text-align: center;">
                       <h4 id="tletra"><em><center>AGROSERVICIO &nbsp;&nbsp;&nbsp;EL &nbsp;&nbsp;&nbsp;RANCHITO</center></em></h4>
                  </div>
                  <div class="col-md-4 nombreH">
                     <?php if(isset($_SESSION['usuario'])){  ?>
                <h6 style="color: white;">Usuario: &nbsp; <?php echo $_SESSION['usuario']; ?> </h6>
                <a href="./php/logout.php" class="btn btn-primary">Cerrar Sesion</a>
                <?php }else if (isset($_SESSION['Admin'])){ ?>
                    <h6 style="color: white;">Bienvenido/a Administrador: &nbsp; <?php echo $_SESSION['Admin']; ?> </h6>

                   <a href="admin/index.php"  class="btn btn-dark">Administracion de Sitio Web</a>
                   <a href="./php/logout.php" class="btn btn-dark">Cerrar Sesion</a>


                  <?php 
                    }else{
                   ?>
                   <div id="nav" style="margin-top: 5px; margin-left: 150px;">
                     <button type="button" data-toggle="modal" data-target="#myModal"
                      class="btn btn-success">Iniciar Sesion</button>
                     &nbsp;&nbsp;
                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Registrarse</button>            
                   </div>
                  

                          

                    <?php } ?>
                  </div>

        </div>
          <div id="div_user" class="col-xs-12 col-sm-2 col-md-2">
      
               <!-- Inicio del formulario modal -->
               <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

              <div class="modal-dialog modal-signin">

                <div class="modal-content">

                  <div class="modal-header col-md-10">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <br>
                    <h3><em>Inicia Sesion en el Sitio</em></h3>
            
                  </div>

                  <div class="modal-body " align="center">
                    <form method="" class="form-signin" id="flogin">
                      <i class="fas fa-user fa-5x" id="inilog"></i>
                      <br><br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email" placeholder="ingrese su correo" autocomplete="off" autofocus="on">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="clave" id="clave" placeholder="Password">
                        </div>
                    </form>
                  </div>

                  <div class="modal-footer ">
                    <div class="col-sm-12">
                      <button style="margin-left: 6px;" type="button" class="btn btn-primary  btn-block" name="button" onclick="verificarUsuario()">Iniciar Sesion</button>
                    </div>    
                     
                  </div>
                   <div class="alert alert-primary" role="alert" id="info2">
                      
                    </div>
                </div>

              </div>
                
            </div> 
        </div> <!-- fin div para usuario -->

        <div class="row">
                    <div>
                      
                     <!--Para cargar otras pag en php -->
                                  
                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Registro para realizar cotizacion de productos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body"> 
                            <form id="fAddRegistro" novalidate>
                              <input type="hidden" name="opc" value="new">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-control">Nombre:</label>
                                  <input class="col-md-12 col-md-2 form-control" placeholder="Ingrese Nombre de Usuario" type="text" name="nombre" id="nombre"  onkeypress="return(event.charCode >= 65 && event.charCode <=90) || 
                                  (event.charCode >= 97 && event.charCode <=122) || 
                                  event.charCode == 32 || 
                                   (event.charCode >=160 && event.charCode <= 165)" maxlength = "80">
                              </div>
                             
                          

                             <div class="form-group">
                                    <label for="exampleInputEmail2" class="col-form-control col-md-12 col-md-2">Email</label>
                                    <input type="correo" class="form-control" id="correo" name="correo" placeholder="Ingrese correo" onchange="validateMail()">
                                 </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-control">Contraseña</label>
                                  <input type="password" name="pass" id="pass" placeholder="Ingrese su Contraseña" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-control">Confirme contraseña:</label>
                                  <input type="password" name="cpass" id="cpass" placeholder="Confirme su Contraseña" class="form-control">
                              </div>
                              <br>
                              <div align="center">
                                  <button type="button" class="btn btn-primary" id="btn-regUsu" onclick="regUsuario()"><i class="fas fa-user-plus"></i> Registrar</button>
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
   
    
    <div id="nav" style="margin-top: -5px;" > <!-- inicio de div para nav -->
      <div class="row">
      <nav class="navbar col-md-12 navbar-expand-lg navbar-dark bg-dark">
        
  
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link externo" href="./index.php"><i class="fas fa-home" style="color: white;">&nbsp;Inicio</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./php/todos_prod.php"><i class="fas fa-list-alt" style="color: white;">&nbsp;Productos</i></a>
      </li>
      <?php if(isset($_SESSION['usuario'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="./php/ver_cotizacion.php"><i class="fas fa-shopping-cart" style="color: white;">&nbsp;Cotizaciones</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./php/history_coti.php"><i class="fas fa-shopping-basket"  style="color: white;">&nbsp;Historial de Cotizaciones</i></a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="./php/quienes_somos.php"><i class="fas fa-book" style="color: white;">&nbsp;Quienes Somos</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./php/ubicacion.php"><i class="fas fa-map-marker-alt" style="color: white;">&nbsp;Ubicacion</i></a>
      </li>

      </ul>

</nav>
 </div>
 </div>



  <div class="container-fluid" id="contenido">
     <div class="row">
         <div class="container">
             <div class="row">
               <div class="col-md-12">
                 
       <div id="carouselExampleIndicators" class="carousel slide col-md-2 col-md-12" data-ride="carousel">
       <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
      </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="img-responsive" src="images/004.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Semillas de Tomate</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/006.jpg" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
              <h5>Insecticidas</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/002.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Semillas de Chile</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/005.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Fruto de Nuestros Productos de Calidad</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/008.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Diferentes Tipos de Abono</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/011.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Conejos</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/012.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Variedad de maiz en grano para siembra</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/009.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Semillas de Apio</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/014.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Pollos</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/015.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Semillas de Fresa</h5>
            </div>
          </div>
        </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
               </div>
             </div>

         </div>


 <br>
 <br>
 <div class="text-center"> <h4 style=" color: #fff;"><em>Algunos Productos Que Encuentras!</em></h4></div>
   <div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10" id="inicioProd">
      
    </div>
    <div class="col-md-2 text-center">
     <form style="background-color: rgba(255, 255, 255, 0.7); height: 350px; border-radius: 10px 0 0 10px; ">
       <fieldset>
         <legend><ins>Contactenos</ins></legend>
           <h4> 
            <i class="fas fa-envelope fa-2x" style="color: red;" ></i><br>
           <button type="button" style="background-color: transparent;" title="" onclick="formuEnviar()">Escribenos.!</button>
           </li>
           <a href="https://www.facebook.com/Agroservicio-El-Ranchito-2000556116929669/" target="_blank" title="Danos Like"><br><br><i class="fab fa-facebook-square fa-2x"></i><br>Búscanos.!</a></li><br>
           <a title=""><br><i class="fab fa-whatsapp fa-2x" style="color: green;"></i><br>7353-6352</a></li>
          </h4> 
       </fieldset>
     </form>
    </div>
   </div>
  </div>
  
  <div class="row">
  <section id="accordion" >
  <h3 id="tp">Agroservicio El Ranchito</h3>
  <div class="row">
  <div class="col-md-6 text-justify">
    <p align="justify">
      <h4 id="tp1"><strong>MISION</strong></h4>
    Ser una empresa de servicios agrícolas para satisfacer necesidades 
    de los productos agropecuarios en la zona norte del departemento de san salvador 
    y con la finalidad de fortalecer la economía familiar de sus accionistas y empleados, mediante 
    la superación y capacitación de las tecnologías y experiencia técnica y 
    profesional en los mercados de insumos agrícolas.
    </p>
  </div>
  
  <div class="col-md-6 text-justify">
    <p align="justify">
      <h4 id="tp2"><strong>VISION</strong></h4>
    Ser la empresa líder de comercialización de agroquímicos de la zona norte del departamento de san salvador 
    logrando el posicionamiento de nuestros productores agrícolas mediante 
    la innovación de soluciones para sus cultivos.
    </p>
  </div>
</div>
</section> 
</div>

  <div class="row">
      <div class="container-fluid">
         <div class="row">
          <h4 id="contacto" class="container-fluid"> 
           
           <button type="button"  title="" onclick="formuEnviar()"><i class="fas fa-envelope" style="color: red;" ></i> Escribenos.!</button>
          <a href="https://www.facebook.com/Agroservicio-El-Ranchito-2000556116929669/" target="_blank" title="Danos Like"><i class="fab fa-facebook-square"></i> Buscanos.!</a></h4>
        
  </div>
    <div class="row">
      <footer class="container-fluid col-md-12" >
      <h5><em>Calle principal. 10ª avenida sur, Barrio el centro, Aguilares, San Salvador </em> </h5>
      </footer>
    </div>
  </div>
</div>
</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="./js/jqBootstrapValidation.js"></script>
    <script src="./js/datatables.min.js"></script>
    <script src="./js/scripts.js"></script>
    <script src="./jquery-ui/jquery-ui.min.js"></script>
    <script src="./jquery-ui/jquery.ui.datepicker-es.js"></script>
  </body>
</html>