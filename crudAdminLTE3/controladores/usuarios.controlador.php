<?php

class ControladorUsuarios{



	static public function ctrGuardarUsuarios(){

		if (isset($_POST['nombre'])) {


			$tabla = "usuarios";

			$datos = array('nombre' => $_POST['nombre'],
						  'usuario' => $_POST['usuario']);


			$respuesta = ModeloUsuarios::mdlGuardarUsuarios($tabla,$datos);



			if ($respuesta == "ok") {

					echo "<script>

				window.location = 'usuarios';


				</script>";




			}else{


					echo "<script>

				window.location = 'usuarios';


				</script>";


			



			}


			
		}



	}

	static public function ctrMostrarUsuarios($item,$valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item,$valor);

		return $respuesta;


	}




	static public function ctrEditarUsuarios(){

		if (isset($_POST["editaridusuarios"])) {

			$tabla = "usuarios";

			$datos = array("id" => $_POST["editaridusuarios"],
						  "nombre" => $_POST["editarnombreusuarios"],
						  "usuario" => $_POST["usuarioseditar"]);



			$respuesta = ModeloUsuarios::mdlEditarUsuarios($tabla,$datos);


			if ($respuesta == "ok") {

					echo "<script>

				window.location = 'usuarios';


				</script>";




			}else{


					echo "<script>

				window.location = 'usuarios';


				</script>";


			



			}




			
		}


	}


	static public function ctrBorrarUsuarios(){


		if (isset($_GET["idUsuarios"])) {


			$tabla = "usuarios";
			$datos = $_GET['idUsuarios'];

			$respuesta = ModeloUsuarios::mdlBorrarUsuarios($tabla,$datos);



			if ($respuesta == "ok") {

					echo "<script>

				window.location = 'usuarios';


				</script>";




			}else{


					echo "<script>

				window.location = 'usuarios';


				</script>";


			



			}


		}
	}


}

?>