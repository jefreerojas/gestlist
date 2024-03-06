<?php

class ControladorCasos
{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarCasos($item, $valor, $orden)
	{

		$tabla = "casos";

		$respuesta = ModeloCasos::mdlMostrarCasos($tabla, $item, $valor, $orden);

		return $respuesta;
	}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearCaso()
	{

		if (isset($_POST["nuevaDescripcion"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMotivo"])) {

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "vistas/img/casos/default/anonymous.png";

				if (isset($_FILES["nuevaImagen"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/casos/" . $_POST["nuevoCodigo"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/casos/" . $_POST["nuevoCodigo"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["nuevaImagen"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/casos/" . $_POST["nuevoCodigo"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
				}

				$tabla = "casos";

				$datos = array(
					"id_categoriac" => $_POST["nuevaCategoria"],
					"codigo" => $_POST["nuevoCod"],
					"id_estado" => $_POST["nuevaEstado"],
					"motivo" => $_POST["nuevoMotivo"],
					"descripcion" => $_POST["nuevaDescripcion"],
					"imagen" => $ruta
				);

				$respuesta = ModeloCasos::mdlIngresarCaso($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

						swal({
							  type: "success",
							  title: "El caso ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "casos";

										}
									})

						</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡El caso no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "casos";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarCaso()
	{

		if (isset($_POST["editarDescripcion"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMotivo"])) {

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["imagenActual"];

				if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/casos/" . $_POST["editarCodigo"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/casos/default/anonymous.png") {

						unlink($_POST["imagenActual"]);
					} else {

						mkdir($directorio, 0755);
					}

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["editarImagen"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/casos/" . $_POST["editarCodigo"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["editarImagen"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/casos/" . $_POST["editarCodigo"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
				}

				$tabla = "casos";

				$datos = array(
					"id_categoriac" => $_POST["editarCategoria"],
					"id_estado" => $_POST["editarEstado"],
					"codigo" => $_POST["editarCodigo"],
					"motivo" => $_POST["editarMotivo"],
					"descripcion" => $_POST["editarDescripcion"],
					"imagen" => $ruta
				);

				$respuesta = ModeloCasos::mdlEditarCaso($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

						swal({
							  type: "success",
							  title: "El caso ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "casos";

										}
									})

						</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡El caso no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "casos";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/
	static public function ctrEliminarCaso()
	{

		if (isset($_GET["idCaso"])) {

			$tabla = "casos";
			$datos = $_GET["idCaso"];

			if ($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/casos/default/anonymous.png") {

				unlink($_GET["imagen"]);
				rmdir('vistas/img/casos/' . $_GET["codigo"]);
			}

			$respuesta = ModeloCasos::mdlEliminarCaso($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "El caso ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "casos";

								}
							})

				</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaCasos()
	{

		$tabla = "casos";

		$respuesta = ModeloCasos::mdlMostrarSumaCasos($tabla);

		return $respuesta;
	}
}
