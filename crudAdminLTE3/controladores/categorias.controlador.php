<?php

class ControladorCategorias{



	static public function ctrGuardarCategorias(){

		if (isset($_POST['nombre'])) {


			$tabla = "categorias";

			$datos = array('nombre' => $_POST['nombre']);


			$respuesta = ModeloCategorias::mdlGuardarCategorias($tabla,$datos);



			if ($respuesta == "ok") {

					echo "<script>

				window.location = 'categorias';


				</script>";




			}else{


					echo "<script>

				window.location = 'categorias';


				</script>";


			



			}


			
		}



	}

	static public function ctrMostrarCategorias($item,$valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item,$valor);

		return $respuesta;


	}




	static public function ctrEditarCategorias(){

		if (isset($_POST["editarnombre"])) {

			$tabla = "categorias";

			$datos = array("id" => $_POST["editarid"],
						  "nombre" => $_POST["editarnombre"]);



			$respuesta = ModeloCategorias::mdlEditarCategorias($tabla,$datos);


			if ($respuesta == "ok") {

					echo "<script>

				window.location = 'categorias';


				</script>";




			}else{


					echo "<script>

				window.location = 'categorias';


				</script>";


			



			}




			
		}


	}


	static public function ctrBorrarCategorias(){


		if (isset($_GET["idCategoria"])) {


			$tabla = "categorias";
			$datos = $_GET['idCategoria'];

			$respuesta = ModeloCategorias::mdlBorrarCategorias($tabla,$datos);



			if ($respuesta == "ok") {

					echo "<script>

				window.location = 'categorias';


				</script>";




			}else{


					echo "<script>

				window.location = 'categorias';


				</script>";


			



			}


		}
	}


}

?>