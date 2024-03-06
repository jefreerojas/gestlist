<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";

require_once "controladores/categoriasc.controlador.php";
require_once "controladores/casos.controlador.php";
require_once "controladores/estados.controlador.php";

require_once "modelos/estados.modelo.php";
require_once "modelos/usuarios.modelo.php";

require_once "modelos/categoriasc.modelo.php";
require_once "modelos/casos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();