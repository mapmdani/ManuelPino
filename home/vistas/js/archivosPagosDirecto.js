$(function () {
	
	if (window.matchMedia("(max-width:767px)").matches) {

	// alert(1);

	var table = $('#PagosDirectoTable').DataTable({

		"processing": true,
		"serverSide": true,
		"responsive": true,
		"stateSave": true,
		"order": [[1, "desc"]],
		"ajax": {
			"url": "ajax/sSp-pagosDirectos.ajax.php",
			"type": "POST"
		}

	})

	} else {
		var table = $('#PagosDirectoTable').DataTable({

			"processing": true,
			"serverSide": true,
			"responsive": true,
			"stateSave": true,
			"order": [[1, "desc"]],
			"ajax": {
				"url": "ajax/sSp-pagosDirectos.ajax.php",
				"type": "POST"
			}


		});

}


$("#formPagoDirecto").bind("submit",function(e){
	e.preventDefault();

	var txtInputFile = $(".nuevoArchivo")[0].files[0];

	var fileName = txtInputFile["name"];
	console.log(fileName);

	var datos = new FormData;
	datos.append('file', fileName);

	
	$("#guardarArchivo").prop('disabled', true);

	$("#content").html('<div class="loading" style="text-align: center;"><img src="vistas/img/plantilla/loading.gif" height="50px"/><br/>Por favor espere...<br>Puede tomar unos minutos</div>');
	
	$.ajax({

		url:"ajax/pagosDirecto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		async: true,
		success: function(respuesta){


			console.log(respuesta);
			
			if(respuesta == "ok"){

				swal({

					type: "success",
					title: "¡El archivo" + fileName + "ha sido procesado correctamente!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"

				}).then(function(result){

					if(result.value){
					
						window.location = "inicio";

					}

				});
			}else{

				swal({

					type: "error",
					title: "¡Erro el archivo"  + fileName + " no ha sido procesado!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"

				}).then(function(result){

					if(result.value){
					
						window.location = "pagosdirecto";

					}

				});
			}

		}

	});
	
});


/*=============================================
SUBIENDO LA ARCHIVO DE PAGOS DIRECTO
=============================================*/
$(".nuevoArchivo").change(function(){

	var archivo = this.files[0];

	// alert(archivo);
	// console.log(archivo);
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE ARCHIVO SEA TEXT/PLAIN
  	=============================================*/

  	if(archivo["type"] != "text/plain"){

  		$(".nuevoArchivo").val("");

  		 swal({
		      title: "Error al subir la archivo",
		      text: "¡El archivo debe estar en formato texto plano!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(archivo["size"] > 20000000){

  		$(".nuevoArchivo").val("");

  		 swal({
		      title: "Error al subir archivo",
		      text: "¡No debe pesar más de 20MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

		$(".previsualizar").attr("value", archivo["name"]);

		validarArchivo(archivo["name"]);

  	}
})


/*=============================================
REVISAR SI EL ARCHIVO YA ESTÁ REGISTRADO
=============================================*/

function validarArchivo(valArchivo){


	var datos = new FormData();
	datos.append("validarArchivo", valArchivo);

	 $.ajax({
	    url:"ajax/archivos.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){

			// console.log(respuesta);
	    	
	    	if(respuesta){

	    		$("#archivoSeleccionado").parent().after('<div class="alert alert-warning" id="alertarchivo">Este archivo ya fue procesado en la base de datos</div>');

	    		$("#archivoSeleccionado").val("");

				$("#guardarArchivo").prop('disabled', true);

	    	}else{

				$("#alertarchivo").remove();

				$("#archivoSeleccionado").val(valArchivo);

				$("#guardarArchivo").prop('disabled', false);
			}

	    }

	})


}

});
