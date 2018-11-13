<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario</title>

<meta name="viewport" content="width=width-device;initial-scale:1.0;">
</head>
<body>
    <section class="container">
       <div class="row">
        <div class="col-md-3">
          
        </div>
           <div class="col-md-6 " >
               <article class="articulo">
                  
          <form class="form"  method="post" id="info" >
            <br>
            <h3 style="color: white;"><center>Si solicita más información de nuestros productos. Escríbenos</center></h3>
            
          <br><br>
            <label style="color: white;">Nombre</label><br>
            <input type="text" class="form-control" id="nombre" name="nombre" ><br>
            <label style="color: white;">Escriba su correo</label>
            <br>
            <label class="sr-only" for="exampleInputEmail2">Email address</label>
            <input type="email" class="form-control" id="correo" name="correo" >
            <br>
            <label style="color: white;">Asunto</label><br>
            <input type="text" class="form-control" id="asunto" name="asunto">
            <br>
            <label style="color: white;">Mensaje</label><br>
            <textarea name="mensaje" class="form-control" id="mensaje"></textarea>  
          
            <br>
            <div class='col-md-9 col-md-offset-3'>
              <button class="btn btn-primary enviar" type="button" onclick="enviaEmail()">Enviar</button> 
            </div>

            <br><br>          
            <div id="resultado"></div>

            </form>
           </article>
       </div>   
    </div>
   </section>
</body>
<script>
  $(document).ready(function(){
    $("#info").validate();
  })  
  
</script>
</html>


