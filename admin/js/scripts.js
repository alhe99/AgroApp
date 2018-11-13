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
	});
});



function cargarRegProd(){
	$("#show").load('./php/reg_prod.php');
	
}
function deleteProd(pId){
    if(confirm("Esta seguro(a) de eliminar el registro? ")){
        var id;
        var opc;
        $.post('./php/procesa_prod.php',{id:pId,opc:"del"},function(result){
            alert(result);
            $('#filtro').keyup();
            $("#show").load('./php/consulta_prod.php');
        });
    }
}
function editProd(pId){
	var id;
	$.post('./php/edit_prod.php',{id:pId},function(result){
		$('#show').html(result);

	});
}
 function ActProd(){
    if($("#nombrep").val().length==0 ||
		$("#preciop").val().length==0 ||
		$("#fechavep").val().length==0 ||
		$("#descripcionp").val().length==0 ||
		$("#imagenp").val().length==0 ||
		$("#categoriap").val().length==0 ){
		alert("Complete el formulario para actualizar datos de producto")
		return false;
	}else {
		
		 $('#fActProd').on("click",function(e){
            e.preventDefault();

            var formData = new FormData($('#fActProd')[0]);
            var rep = "exito";
            var ruta = "./php/procesa_updProd.php";
            $.ajax({
              url:ruta,
              type: "POST",
              data: formData,
              contentType:false,
              processData:false,
              success: function(result){
			alert(result);
            $("#show").load('./php/consulta_prod.php');

              }

            });

        });
	}
  }

 function editCat(pId){
 	var id;
	$.post('./php/edit_Cate.php',{id:pId},function(result){
		$('#EdiCate').html(result);
	});
 }

 //Funcion para Registrar Una nueva categoria
 function saveCate(){
 	var h = $("#opc1").val();
 	var n = $("#nombre").val();
 	if($("#nombre").val().length==0 ){
		alert("Error: Nombre de Categoria en Blanco, Complete el Campo Requerido")
		return false;
	}else {
		
		$.post('./php/procesa_cate.php',{opc1:h,nombre:n},function(result){
			alert(result);
			$('#nombre').val('');
			$("#TC").load('./php/tab_cate.php');
		});
		
	}
 }

//Funcion para actualizar una categoria
 function ActCate(){
 	 if($("#nombreUpd").val().length==0 ){
		alert("Error: Nombre de Categoria en Blanco, Complete el Campo Requerido")
		return false;
	}else {

		$.post('./php/procesa_cateUpd.php',$("#fActCate").serialize(),function(result){
			alert(result);
			$("#TC").load('./php/tab_cate.php');
			 $("#EdiCate").empty();
		});
	}
 }

 function autenti(){
 	if($('#email').val().length==0 ||
 		$('#clave').val().length==0){
 		$('#msj').html('Digite el usuario y contraseña');
 	return false;
 	}else{
 		$.post('./php/autenticar.php', $('#formLogin').serialize(),function(result){
 			if(result.trim()==''){
 				$(location).attr('href','./index.php');
 			}else{
 				$('#msj').html(result);
 			}
 		});
 	}
 }



