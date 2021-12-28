<?php

require_once "conexion.php";
// require_once "modelos/pagodirecto.modelo.php";

class ModeloArchivo{

	/*=============================================
	MOSTRAR PAGOS DIRECTOS
	=============================================*/

	static public function mdlMostrarArchivos($item, $valor){

		$tabla = "archivos";

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :archivo");

			$stmt -> bindParam(":archivo", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		// $stmt -> close();

		// $stmt = null;

	}

	/*=============================================
	REGISTRO DE PAGOS DIRECTOS
	=============================================*/

	static public function mdlSaveArchivo($datos){

		$tabla = "archivos";

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(archivo) VALUES (:nombre_archivo)");

		$stmt->bindParam(":nombre_archivo", $datos["archivo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

	}

	/*=============================================
	MARCAR ARCHIVO PROCESADO
	=============================================*/

	static public function mdlEditarArchivo($datos){

		$tabla = "archivos";

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET procesado = 1 WHERE archivo = :nombre_archivo");

		$stmt->bindParam(":nombre_archivo", $datos["nombre"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

	}


}