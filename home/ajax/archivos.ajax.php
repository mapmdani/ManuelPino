<?php

require_once "../controladores/archivos.controlador.php";
require_once "../modelos/archivos.modelo.php";

class AjaxArchivos{

	/*=============================================
	VALIDAR ARCHIVO
	=============================================*/	

	public $archivoPD;
	
	public function ajaxValidarArchivo(){
	
		$item = "archivo";
		$valor = $_POST["validarArchivo"];
		$file = ControladorArchivos::ctrMostrarARchivo($item, $valor);

		echo json_encode($file);

	}

}

/*=============================================
VALIDAR ARCHIVO
=============================================*/

if(isset( $_POST["validarArchivo"])){

	$crearPagoDirecto = new AjaxArchivos();
	$crearPagoDirecto -> ajaxValidarArchivo();

}