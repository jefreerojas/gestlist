/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarEstado", function(){

	var idEstado = $(this).attr("idEstado");

	var datos = new FormData();
	datos.append("idEstado", idEstado);

	$.ajax({
		url: "ajax/estados.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarEstado").val(respuesta["estado"]);
     		$("#idEstado").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarEstado", function(){

	 var idEstado = $(this).attr("idEstado");

	 swal({
	 	title: '¿Está seguro de borrar el estado?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar estado!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=estados&idEstado="+idEstado;

	 	}

	 })

})