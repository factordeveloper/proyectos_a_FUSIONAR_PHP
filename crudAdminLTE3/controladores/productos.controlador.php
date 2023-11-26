<?php

class ControladorProductos{



	static public function ctrGuardarProductos(){

		if (isset($_POST['nombre'])) {


			$tabla = "productos";

			$datos = array('nombre' => $_POST['nombre'],
						  'precio' => $_POST['precio']);


			$respuesta = ModeloProductos::mdlGuardarProductos($tabla,$datos);



			if ($respuesta == "ok") {

					echo "<script>

				window.location = 'productos';


				</script>";




			}else{


					echo "<script>

				window.location = 'productos';


				</script>";


			



			}


			
		}



	}

	static public function ctrMostrarProductos($item,$valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item,$valor);

		return $respuesta;


	}




	static public function ctrEditarProductos(){

		if (isset($_POST["idproducto"])) {

			$tabla = "productos";

			$datos = array("id" => $_POST["idproducto"],
						  "nombre" => $_POST["editarnombreproducto"],
						  "precio" => $_POST["editarprecio"]);



			$respuesta = ModeloProductos::mdlEditarProductos($tabla,$datos);


			if ($respuesta == "ok") {

					echo "<script>

				window.location = 'productos';


				</script>";




			}else{


					echo "<script>

				window.location = 'productos';


				</script>";


			



			}




			
		}


	}


	static public function ctrBorrarProductos(){


		if (isset($_GET["idProductos"])) {


			$tabla = "productos";
			$datos = $_GET['idProductos'];

			$respuesta = ModeloProductos::mdlBorrarProductos($tabla,$datos);



			if ($respuesta == "ok") {

					echo "<script>

				window.location = 'productos';


				</script>";




			}else{


					echo "<script>

				window.location = 'productos';


				</script>";


			



			}


		}
	}


}

?>