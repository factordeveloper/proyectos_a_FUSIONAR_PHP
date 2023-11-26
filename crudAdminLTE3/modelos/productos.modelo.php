<?php

require_once "conexion.php";


class ModeloProductos{



	static public function mdlGuardarProductos($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, precio) VALUES(:nombre, :precio)");

		$stmt->bindParam(":nombre", $datos["nombre"]);
		$stmt->bindParam(":precio", $datos["precio"]);


		if ($stmt->execute()) {

			return "ok";

		}else{

			return "error";


		}

		$stmt->close();
		$stmt->null;


	}


	static public function mdlMostrarProductos($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();


			
		}else{


		   $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");


			$stmt->execute();

			return $stmt->fetchAll();



		}

		$stmt->close();

		$stmt->null;


	}


	static public function mdlEditarProductos($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, precio = :precio WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);



		if ($stmt->execute()) {

			return "ok";

		}else{

			return "error";


		}

		$stmt->close();
		$stmt->null;



	}



	static public function mdlBorrarProductos($tabla,$datos){


		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla  WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);
	



		if ($stmt->execute()) {

			return "ok";

		}else{

			return "error";


		}

		$stmt->close();
		$stmt->null;



	}






}

?>