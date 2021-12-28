<?php

require_once "conexion.php";
// require_once "modelos/pagodirecto.modelo.php";

class ModeloPagoDirecto{

	/*=============================================
	MEDIA PAGOS DIRECTOS
	=============================================*/

	static public function mdlMediaPagosDirectos($item, $valor){

		$tabla = "pagosdirectos";

		$stmt = Conexion::conectar()->prepare("SELECT avg(DISTINCT monto) as media, medio_de_pago FROM $tabla GROUP BY medio_de_pago" );

		$stmt -> execute();

		return $stmt -> fetchAll();

	}

	/*=============================================
	SUMAR PAGOS DIRECTOS
	=============================================*/

	static public function mdlSumPagosDirectos($item, $valor){

		$tabla = "pagosdirectos";

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(monto) as monto FROM $tabla WHERE $item = :id");

			$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT sum(monto) as monto FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetch();

		}
		

	}

	/*=============================================
	MOSTRAR PAGOS DIRECTOS
	=============================================*/

	static public function mdlMostrarPagosDirectos($item, $valor){

		$tabla = "pagosdirectos";

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");

			$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}

	/*=============================================
	REGISTRO DE PAGOS DIRECTOS
	=============================================*/

	static public function mdlIngresarPago($datos){

		$tabla = "pagosdirectos";

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo_de_pago, transaccion, monto, identificador, fecha, medio_de_pago) VALUES (:tipo_de_pago, :transaccion, :monto, :identificador, :fecha, :medio_de_pago)");

		$stmt->bindParam(":tipo_de_pago", $datos["mPago"], PDO::PARAM_STR);
		$stmt->bindParam(":transaccion", $datos["nTrans"], PDO::PARAM_STR);
		$stmt->bindParam(":monto", $datos["importe"], PDO::PARAM_STR);
		$stmt->bindParam(":identificador", $datos["identificador"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":medio_de_pago", $datos["mPago"], PDO::PARAM_STR);

		try{

			$stmt->execute();

			return "ok";

		}catch  (Exception $e){

			return 'Exception when calling OAuth20Api->getToken: '.$e->getMessage();
		}

	}

}