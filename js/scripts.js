$(document).ready(function(){
	//Proceso para cargar otras paginas en el div  de contenido, toto y cuando los enlaces se encuentren dentro de un id="nav"
	$("#nav a").not(".externo").each(function(){
		var href = $(this).attr("href");
		$(this).attr({
			href:"#"
		});
		$(this).click(function(){
			$("#contenido").load(href);
		});
		
      $( function() {
		    $( "#accordion" ).accordion();
		  } );
  		
	});
	$("#inicioProd").load('./php/prod_ppal.php');



});

/*Funciones para CRUD de empleados */

function cargarRegProd(){
	$("#show").load('./php/reg_prod.php');
	hidden("./php/productos.php");
}
function saveProd(){
	if($("#nombre").val().length==0 
		/*$("#precio").val().length==0 ||
		$("#fechave").val().length==0 ||
		$("#descripcion").val().length==0 
		$("#cliente").val().length==0*/){
		alert("Complete el formulario para el registrar el empleado")
		return false;
	}else {
		//Enviar los datos al servidor para guardarlos
		$.post('./php/procesa_prod.php',$("#fRegProd").serialize(),function(result){
			alert(result);
			$("#contenido").load('./php/empleados.php');
		});
		
	}

}

function formuEnviar(){
	$("#contenido").load('./php/formulario.php');
}



function autenti(){
	if($('#email').val().length==0 ||
	   $('#clave').val().length==0){
	   alert('Digite usuario y contraseña');
	   return false;
	}else{
		$.post('./php/autenticar.php', $('#formLogin').serialize(), function(result){
			
			
			if(result.trim()==''){
				$(location).attr('href','./index.php');
			}else{
				alert(result);
			} 
		});
	}
}

function regUsuario(){
	if($("#nombre").val().length==0||
		$("#correo").val().length==0||
		$("#pass").val().length==0||
		$("#cpass").val().length==0){
		alert('Debe Completar todos los campos del formulario')
		return false;
	}if($("#pass").val()==$("#cpass").val()){
		$.post('./php/procesa_registro.php', $('#fAddRegistro').serialize(),function(result){
			alert(result);
			$('#contenido').load('./php/login.php');
		});
	}else{
		alert('Las Contraseñas No Coinciden, Verifique Nuevamente');
	}
}

function verificarUsuario(){
	if($('#email').val().length == 0 || $('#clave').val().length == 0){
			$('#info2').html('Digite usuario y contraseña');
			return false;
	}else{
		
		$.post('./php/autenticar_usuario.php',
			$('#flogin').serialize(),
			function(result){
				if(result.trim()==''){
					$(location).attr('href','./index.php');
					
				}else{
					$('#info2').html(result);
				}
			});
			
	}
}

function enviaEmail(){
		$(".enviar").click(function(e){
			e.preventDefault();
			$(this).attr("disabled","true").html('<i class="fa fa-spinner fa-spin"></i> Enviando...');
		     $.post( "php/send.php", $("#info").serialize()).done(function( res ) {
             $("#resultado").html("<strong>" + res + "</strong>");
			 $(".enviar").removeAttr("disabled").html("Enviar");
			 
  			});
        
		});
	}
	   	
function SearchCate(pId){
	var id;
	$.post('./php/Busq_ProdCate.php',{id:pId},function(result){
		$('#show').html(result);
	});
}	

function addItemCoti(pId){

	var idprod=pId;
	if($('#cantidad').val().length==0){
		alert('Digite cantidad del producto a Cotizar');
		return false;
	}else{
		$.post('./php/agregar_itemC.php',
			$('#formItemCoti'+idprod).serialize(),
			function(result){
				alert(result);
				$('#modalCot').hide();
				$('#btn-cerrar').click();
			});
	} 
}
function eliminarCoti(pItem){
	$.post('./php/quitar_Icoti.php', { indice: pItem },function(){
		$('#contenido').load('./php/ver_cotizacion.php');	
		
	});
}  
function confirmarCoti(pTotal)
{
	if(confirm("Esta seguro(a) de confirmar la Cotización?")){
		var opc;
		$.post('./php/guardar_coti.php',{
			opc:"new",
			total:pTotal
		},function(result){
			alert(result);
			
		});
	}
}

function validateMail(){
	var std=1;
	var object=document.getElementById("correo");
	var valueform=object.value;
	button = document.getElementById("btn-regUsu");
	if(std==1){
		button.disabled = false;
	}
	
	var patron= /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(valueform.search(patron)==0){
		object.style.color="#000";
		return;
		std =1;
		if(std==1){
			button.disabled=false;
		}
	}else{
		object.style.color="#f00";
		alert("Error o formato de correo incorrecto")
	}
	std=0;
	if(std==0){
		button.disabled = true;
	}
}



