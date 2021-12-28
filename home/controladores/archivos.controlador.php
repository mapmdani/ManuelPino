<?php

class ControladorArchivos{

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrMostrarARchivo($item, $valor){


		$respuesta = ModeloArchivo::mdlMostrarArchivos($item, $valor);

		return $respuesta;

	}

	/*=============================================
	GUARDAR ARCHIVO
	=============================================*/

	static public function ctrSaveArchivos($fileName){

		if(isset($fileName)){

			$datos = array("archivo" => $fileName["file"]);

			$save = ModeloArchivo::mdlSaveArchivo($datos);

			return $save;

		}

	}

	/*=============================================
	MARCAR ARCHIVO PROCESADO
	=============================================*/

	static public function ctrEditarArchivo($name){


		$datos = array("nombre" => $name);

		$respuesta = ModeloArchivo::mdlEditarArchivo($datos);

		if($respuesta == "ok"){

			return $respuesta;

		}else{

			return "error";
		}
	}

}
	


