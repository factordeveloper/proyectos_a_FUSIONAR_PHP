<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";



class AjaxUsuarios{

	public $idUsuarios;

	public function ajaxEditarUsuarios(){

		$item = "id";
		$valor = $this->idUsuarios;


		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

		echo json_encode($respuesta);



	}


}


if (isset($_POST["idUsuarios"])) {

	$editar = new AjaxUsuarios();
	$editar->idUsuarios = $_POST['idUsuarios'];
	$editar->ajaxEditarUsuarios();
}

?>