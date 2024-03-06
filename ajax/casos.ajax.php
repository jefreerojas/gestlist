<?php

require_once "../controladores/casos.controlador.php";
require_once "../modelos/casos.modelo.php";

require_once "../controladores/categoriasc.controlador.php";
require_once "../modelos/categoriasc.modelo.php";

class AjaxCasos{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCcategoria;

  public function ajaxCrearCodigoCaso(){

  	$item = "id_ccategoria";
  	$valor = $this->idCcategoria;
    $orden = "id";

  	$respuesta = ControladorCasos::ctrMostrarCasos($item, $valor, $orden);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idCaso;
  public $traerCasos;
  public $nombreCaso;

  public function ajaxEditarCaso(){

    if($this->traerCasos == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorCasos::ctrMostrarCasos($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreCaso != ""){

      $item = "descripcion";
      $valor = $this->nombreCaso;
      $orden = "id";

      $respuesta = ControladorCasos::ctrMostrarCasos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idCaso;
      $orden = "id";

      $respuesta = ControladorCasos::ctrMostrarCasos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCcategoria"])){

	$codigoCaso = new AjaxCasos();
	$codigoCaso -> idCcategoria = $_POST["idCcategoria"];
	$codigoCaso -> ajaxCrearCodigoCaso();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idCaso"])){

  $editarCaso = new AjaxCasos();
  $editarCaso -> idCaso = $_POST["idCaso"];
  $editarCaso -> ajaxEditarCaso();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["traerCasos"])){

  $traerCasos = new AjaxCasos();
  $traerCasos -> traerCasos = $_POST["traerCasos"];
  $traerCasos -> ajaxEditarCaso();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nombreCaso"])){

  $traerCasos = new AjaxCasos();
  $traerCasos -> nombreCaso = $_POST["nombreCaso"];
  $traerCasos -> ajaxEditarCaso();

}






