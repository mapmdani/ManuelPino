
/*=============================================
Guardamos Datos de sesion para usarlo en Ajax
=============================================*/

$(document).ready(() => {

	const user = getCookie("userSession")
	const emp = getCookie("empSession")
	const tienda = getCookie("tiendaSession")
	const wToken = getCookie("wMp")
	// console.log(user);
  
	//Aquí puedes crear tu sessionStorages para luego poder
	//leer los valores y mandarlos en cualquier parte de tu js
	//como a la hora de enviar un ajax
	sessionStorage.setItem('user', user);
	sessionStorage.setItem('emp', emp);
	sessionStorage.setItem('emp', emp);
	sessionStorage.setItem('tienda', tienda);
	sessionStorage.setItem('wMp', wToken);

	// eliminarCookies();
  
  });
  
  const getCookie = (cname) => {
	 var v = document.cookie.match('(^|;) ?' + cname+ '=([^;]*)(;|$)');
	 return v ? v[2] : null;
  }


//   function eliminarCookies() {
// 	document.cookie.split(";").forEach(function(c) {
// 	  document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
// 	});
//   }


/*=============================================
Data Table
=============================================*/

$(".tablas").DataTable({

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

});

/*=============================================
 //iCheck for checkbox and radio inputs
=============================================*/

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass   : 'iradio_minimal-blue'
})

/*=============================================
 //input Mask
=============================================*/

//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//Money Euro
$('[data-mask]').inputmask()