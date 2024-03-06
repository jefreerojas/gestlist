<?php

require_once "../controladores/casos.controlador.php";
require_once "../modelos/casos.modelo.php";

require_once "../controladores/categoriasc.controlador.php";
require_once "../modelos/categoriasc.modelo.php";

require_once "../controladores/estados.controlador.php";
require_once "../modelos/estados.modelo.php";


class TablaCasos
{

    /*=============================================
    MOSTRAR LA TABLA DE PRODUCTOS
    =============================================*/

    public function mostrarTablaCasos()
    {

        $item  = null;
        $valor = null;
        $orden = "id";

        $casos = ControladorCasos::ctrMostrarCasos($item, $valor, $orden);

        if (count($casos) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{
		  "data": [';

        for ($i = 0; $i < count($casos); $i++) {

            /*=============================================
            TRAEMOS LA IMAGEN
            =============================================*/

            

            /*=============================================
            TRAEMOS LA CATEGORÍA
            =============================================*/

            $item  = "id";
            $valor = $casos[$i]["id_categoriac"];

            $item2  = "id";
            $valor2 = $casos[$i]["id_estado"];
            
           
            $a = $casos[$i]["descripcion"];

            $b = str_replace("\r\n", " <br> ", $a);

            if ($casos[$i]["id_estado"] == 0) {

                $id_estado = "<button class='btn btn-warning'>" . "ABIERTO". "</button>";

            } else if ($casos[$i]["id_estado"] >= 1 && $casos[$i]["id_estado"] < 2) {

                $id_estado = "<button class='btn btn-info'>" . "EN CURSO" . "</button>";

            } else if ($casos[$i]["id_estado"] >= 2 && $casos[$i]["id_estado"] < 3) {

                $id_estado = "<button class='btn btn-alert'>" . "OBSERVADO" . "</button>";

            } 
             else if ($casos[$i]["id_estado"] >= 3 && $casos[$i]["id_estado"] < 4) {

                $id_estado = "<button class='btn btn-success'>" . "CERRADO" . "</button>";

            }else {

                $id_estado = "<button class='btn btn-light'>" . "NO ASIGNADO" . "</button>";

            }
            /*=============================================
            STOCK
            =============================================*/
            
            if ($casos[$i]["id_categoriac"] <= 1) {

                $id_categoriac = "<button class='btn btn-light'>" . "APPS". "</button>";

            } else if ($casos[$i]["id_categoriac"] >= 2 && $casos[$i]["id_categoriac"] < 3) {

                $id_categoriac = "<button class='btn btn-light'>" . "WEB" . "</button>";

            } else if ($casos[$i]["id_categoriac"] >= 3 && $casos[$i]["id_categoriac"] < 4) {

                $id_categoriac = "<button class='btn btn-light'>" . "APIS" . "</button>";

            }else {

                $id_categoriac = "<button class='btn btn-light'>" . "OTROS" . "</button>";

            }


            



            
            /*=============================================
            TRAEMOS LAS ACCIONES
            =============================================*/

            if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial") {

                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idCaso='" . $casos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>";

            } else {

                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idCaso='" . $casos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idCaso='" . $casos[$i]["id"] . "' codigo='" . $casos[$i]["codigo"] . "' imagen='" . $casos[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";

            }

            $datosJson .= '[
			      "' . ($i + 1) . '",
                  "' . $casos[$i]["motivo"] . '",
			      "' . $b . '",
			      "' . $casos[$i]["fecha"] . '",
                  "' . $id_categoriac . '",
                  "' . $id_estado . '",
			      "' . $botones . '"
			    ],';

        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']

		 }';

        echo $datosJson;

    }

}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activarCasos = new TablaCasos();
$activarCasos->mostrarTablaCasos();
