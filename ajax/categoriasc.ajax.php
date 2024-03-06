<?php

require_once "../controladores/categoriasc.controlador.php";
require_once "../modelos/categoriasc.modelo.php";

class AjaxCategoriasc{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCategoriac;

	public function ajaxEditarCategoriac(){

		$item = "id";
		$valor = $this->idCategoriac;

		$respuesta = ControladorCategoriasc::ctrMostrarCategoriasc($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idCategoriac"])){

	$categoriac = new AjaxCategoriasc();
	$categoriac -> idCategoriac = $_POST["idCategoriac"];
	$categoriac -> ajaxEditarCategoriac();
}
