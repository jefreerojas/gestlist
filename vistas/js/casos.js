/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

// $.ajax({

// 	url: "ajax/datatable-productos.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

var perfilOculto = $("#perfilOculto").val();

$('.tablaCasos').DataTable( {
    "ajax": "ajax/datatable-casos.ajax.php?perfilOculto="+perfilOculto,
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

/*=============================================
CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
=============================================*/
$("#nuevaCategoria").change(function(){

	var idCategoriac = $(this).val();

	var datos = new FormData();
  	datos.append("idCategoriac", idCategoriac);

  	$.ajax({

      url:"ajax/casos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
	  success:function(respuesta){

	
		if(!respuesta){

			
			var min=1; 
			var max=99;  
			var random =Math.floor(Math.random() * (+max - +min)) + +min; 
			var aleatorio =Math.floor(Math.random() * (+max - +min)) + +min; 


			
			var nuevoCodigo = idCategoria+"00"+ random + aleatorio;
			$("#nuevoCodigo").val(nuevoCodigo);

			var nuevoCod = idCategoria+"0121" + random + aleatorio;
			$("#nuevoCod").val(nuevoCod);

		}else{


		  var nuevoCod = Number(respuesta["codigo"]) + 99;
			$("#nuevoCod").val(nuevoCod);

			var nuevoCodigo = Number(respuesta["codigo"]) + 999;
			$("#nuevoCodigo").val(nuevoCodigo);

		}
			  
	}

	})

})



/*=============================================
EDITAR caso
=============================================*/

$(".tablaCasos tbody").on("click", "button.btnEditarProducto", function(){

	var idCaso = $(this).attr("idCaso");
	
	var datos = new FormData();
    datos.append("idCaso", idCaso);

     $.ajax({

      url:"ajax/casos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
          
          var datosCategoriac = new FormData();
          datosCategoriac.append("idCategoriac",respuesta["id_categoriac"]);

           $.ajax({

              url:"ajax/categoriasc.ajax.php",
              method: "POST",
              data: datosCategoriac,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarCategoria").val(respuesta["id"]);
                  $("#editarCategoria").html(respuesta["categoriac"]);

				  
              }

          })

		  $("#editarCod").val(respuesta["cod"]);

           $("#editarCodigo").val(respuesta["codigo"]);

		   $("#editarEstado").html(respuesta["id_estado"]);

		   $("#editarMotivo").val(respuesta["motivo"]);

		   
           $("#editarDescripcion").val(respuesta["descripcion"]);



      }

  })

})

/*=============================================
ELIMINAR PRODUCTO
=============================================*/

$(".tablaCasos tbody").on("click", "button.btnEliminarProducto", function(){

	var idCaso = $(this).attr("idCaso");
	var codigo = $(this).attr("codigo");
	var imagen = $(this).attr("imagen");
	
	swal({

		title: '¿Está seguro de borrar el caso?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar caso!'
        }).then(function(result) {
        if (result.value) {

        	window.location = "index.php?ruta=casos&idCaso="+idCaso+"&imagen="+imagen+"&codigo="+codigo;

        }


	})

})
	
