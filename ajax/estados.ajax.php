<?php

require_once "../controladores/estados.controlador.php";
require_once "../modelos/estados.modelo.php";

class AjaxEstados{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idEstados;

	public function ajaxEditarEstado(){

		$item = "id";
		$valor = $this->idEstado;

		$respuesta = ControladorEstados::ctrMostrarEstados($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idEstado"])){

	$estado = new AjaxEstados();
	$estado -> idEstado = $_POST["idEstado"];
	$estado -> ajaxEditarEstado();
}
