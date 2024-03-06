<?php

if ($_SESSION["perfil"] == "Vendedor") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>
<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar casos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrarcasos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">

          Agregar casos

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaCasos" width="100%">

          <thead>

            <tr>

              <th style="width:2px">#</th>
              <th>Motivo</th>
              <th>Descripción</th>
              <th>Agregado</th>
              <th>Proyecto</th>
              <th>Estado</th>
              <th>Acciones</th>

            </tr>

          </thead>

        </table>

        <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Casos</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>

                  <option value="">Selecionar Tipo de Proyecto</option>

                  <?php

                  $item  = null;
                  $valor = null;

                  $categoriasc = ControladorCategoriasc::ctrMostrarCategoriasc($item, $valor);

                  foreach ($categoriasc as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["categoriac"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="nuevaEstado" name="nuevaEstado" required>

                  <option value="">Selecionar Estado</option>

                  <?php

                  $item  = null;
                  $valor = null;

                  $estados = ControladorEstados::ctrMostrarEstados($item, $valor);

                  foreach ($estados as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["estado"] . '</option>';
                  }

                  ?>
                </select>

              </div>

            </div>


            <!-- ENTRADA PARA EL CÓDIGO -->

            <div class="hidden">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCod" name="nuevoCod" placeholder="Ingresar código" readonly required>

              </div>

            </div>







            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoMotivo" placeholder="Título" required>

              </div>

            </div>


            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <textarea class="form-control" rows="3" type="text" name="nuevaDescripcion" placeholder="Ingresar descripción"></textarea>


              </div>

            </div>


            <div class="form-group">


            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar caso</button>

        </div>

      </form>

      <?php

      $crearCaso = new ControladorCasos();
      $crearCaso->ctrCrearCaso();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar caso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
            <div class="form-group">



            </div>
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="editarCategoria" required>

                  <option id="editarCategoria">
                    <?php

                    $item  = null;
                    $valor = null;

                    $categoriasc = ControladorCategoriasc::ctrMostrarCategoriasc($item, $valor);

                    foreach ($categoriasc as $key => $value) {

                      echo '<option value="' . $value["id"] . '">' . $value["categoriac"] . '</option>';
                    }

                    ?> </option>

                </select>

              </div>

            </div>






            <!-- ENTRADA PARA EL CÓDIGO -->

            <div class="hidden">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>

            </div>



            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <select class="form-control input-lg" name="editarEstado" required>

                  <option id="editarEstado">
                    <?php

                    $item  = null;
                    $valor = null;

                    $estados = ControladorEstados::ctrMostrarEstados($item, $valor);

                    foreach ($estados as $key => $value) {

                      echo '<option value="' . $value["id"] . '">' . $value["estado"] . '</option>';
                    }

                    ?> </option>

                </select>
              </div>

            </div>



            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>

                <input type="text" class="form-control input-lg" id="editarMotivo" name="editarMotivo" placeholder="Título" required>

              </div>

            </div>






            <div class="form-group">
            </div>
            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <textarea class="form-control" rows="3" type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion"></textarea>
              </div>

            </div>

            <!-- ENTRADA PARA STOCK -->

            <div class="form-group">



            </div>

            <!-- ENTRADA PARA PRECIO COMPRA -->

            <div class="form-group row">





            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="hidden">

              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="editarImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/casos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

      $editarCaso = new ControladorCasos();
      $editarCaso->ctrEditarCaso();

      ?>

    </div>

  </div>

</div>

<?php

$eliminarCaso = new ControladorCasos();
$eliminarCaso->ctrEliminarCaso();

?>