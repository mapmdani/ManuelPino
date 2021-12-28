<?php

require_once "../controladores/pagodirecto.controlador.php";
require_once "../controladores/archivos.controlador.php";
require_once "../modelos/pagodirecto.modelo.php";
require_once "../modelos/archivos.modelo.php";

class AjaxPagosDirecto{

	/*=============================================
	CREAR PAGO DIRECTO
	=============================================*/	

	public $archivoPD;
	
	public function ajaxCrearPagoDirecto(){
	
		$fileName = $_POST;
		$file = ControladorArchivos::ctrSaveArchivos($fileName);

		if ($file == "ok"){
			
			$respuesta = ControladorPagoDirecto::ctrCrearPagoDirecto();

			echo json_encode($respuesta);

		}

	}

}

/*=============================================
CREAR PAGO DIRECTO
=============================================*/

if(isset( $_POST["file"])){

	$crearPagoDirecto = new AjaxPagosDirecto();
	// $crearPagoDirecto -> archivoPD = $_POST["fileTxtPagoDirecto"];
	$crearPagoDirecto -> ajaxCrearPagoDirecto();

}