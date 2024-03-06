<?php

$item  = null;
$valor = null;
$orden = "id";


$categoriasc      = ControladorCategoriasc::ctrMostrarCategoriasc($item, $valor);
$totalCategoriasc = count($categoriasc);



$casos      = ControladorCasos::ctrMostrarCasos($item, $valor, $orden);
$totalCasos = count($casos);

?>



<div class="col-lg-12 col-xs-12">

  <div class="small-box bg-aqua">

    <div class="inner">

    <h3><?php echo number_format($totalCasos); ?></h3>

      <p>Casos</p>

    </div>

    <div class="icon">

    <i class="icon ion-ios-copy"></i>

    </div>

    <a href="casos" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>




