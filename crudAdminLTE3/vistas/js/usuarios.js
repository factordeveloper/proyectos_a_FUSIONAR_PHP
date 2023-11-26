
$(".tablas").on("click", ".btnEditarUsuarios", function(){

	var idUsuarios = $(this).attr("idUsuarios");

	var datos = new FormData();

	datos.append("idUsuarios", idUsuarios);



	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){


			$("#editaridusuarios").val(respuesta["id"]);
			$("#editarnombreusuarios").val(respuesta["nombre"]);
			$("#usuarioseditar").val(respuesta["usuario"]);


		}



	})




})



$(".tablas").on("click", ".btnEliminarUsuarios", function(){

	var idUsuarios = $(this).attr("idUsuarios");


	window.location = "index.php?ruta=usuarios&idUsuarios="+idUsuarios;





})