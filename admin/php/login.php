<?php 
	session_start();
 ?>
 <!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet"  href="../jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet"  href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet"  href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet"  href="../css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet"  href="../css/material.min.css">

    <title>Login</title>
</head>
<body >
    <div class="container-fluid"> <!-- Contenerdor principal -->
          <div class="row">
            <div class="col-md-12" id="enca">
            
        </div>
      </div>
    </div>

	<div class="login">
        <br><br>
   <h1 class="text-center" id="textLogin">Iniciar Sesion</h1>
   
    <form class="text-center estiloLogin" id="formLogin">
    <div class="row">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            <i class="fas fa-user-circle fa-10x colorfondo"></i>
            <br><br>
           <input type="email" class="inputLogin form-control" name="email" id="email" placeholder="Usuario" required="required" />
        <br>
        <br>
        <input type="password" class="inputLogin form-control" name="clave" id="clave" placeholder="Contraseña" required="required" /> 
        </div>
        <div class="col-md-4">
            
        </div>
        
    </div>
    	
        <br>
        <button type="button" id="btn-login" class="btn btn-primary" onclick="autenti()">Ingresar.</button>
    </form>
    <br>
    <div id="msj">
        
    </div>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- login bootsnipp -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9155049400353686"
     data-ad-slot="9589048256"
     data-ad-format="auto"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>


<script src="../js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="../jquery-ui/jquery-ui.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/dataTables.responsive.min.js"></script>
    <script src="../js/dataTables.material.min.js"></script>
    <script src="../js/fontawesome-all.min.js"></script>
	
</body>
</html>