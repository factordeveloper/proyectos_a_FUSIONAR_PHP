
$(".tablas").on("click", ".btnEditarProductos", function(){

	var idProductos = $(this).attr("idProductos");

	var datos = new FormData();

	datos.append("idProductos", idProductos);



	$.ajax({

		url:"ajax/productos.ajax.php",
		method:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){


			$("#idproducto").val(respuesta["id"]);
			$("#editarnombreproducto").val(respuesta["nombre"]);
			$("#editarprecio").val(respuesta["precio"]);


		}



	})




})



$(".tablas").on("click", ".btnEliminarProductos", function(){

	var idProductos = $(this).attr("idProductos");


	window.location = "index.php?ruta=productos&idProductos="+idProductos;





})