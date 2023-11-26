
$(".tablas").on("click", ".btnEditarCategoria", function(){

	var idCategorias = $(this).attr("idCategoria");

	var datos = new FormData();

	datos.append("idCategoria", idCategorias);



	$.ajax({

		url:"ajax/categorias.ajax.php",
		method:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){


			$("#editarid").val(respuesta["id"]);
			$("#editarnombre").val(respuesta["nombre"]);


		}



	})




})



$(".tablas").on("click", ".btnEliminarCategoria", function(){

	var idCategorias = $(this).attr("idCategoria");


 	window.location = "index.php?ruta=categorias&idCategoria="+idCategorias;





})