<?php

class ControladorPagoDirecto{

	/*=============================================
	MOSTRAR PAGOS DIRECTOS
	=============================================*/

	static public function ctrMostrarPagosDirectos($item, $valor){

		$respuesta = ModeloPagoDirecto::mdlMostrarPagosDirectos($item, $valor);

		return $respuesta;
	}

	/*=============================================
	SUMAR PAGOS DIRECTOS
	=============================================*/

	static public function ctrSumrPagosDirectos($item, $valor){

		$respuesta = ModeloPagoDirecto::mdlSumPagosDirectos($item, $valor);

		return $respuesta;
	}

	/*=============================================
	MEDIA PAGOS DIRECTOS
	=============================================*/

	static public function ctrMediaPagosDirectos($item, $valor){

		$respuesta = ModeloPagoDirecto::mdlMediaPagosDirectos($item, $valor);

		return $respuesta;
	}

	/*=============================================
	REGISTRO DE PAGOS DIRECTOS
	=============================================*/

	static public function ctrCrearPagoDirecto(){

		if(isset($_POST["file"])){

			$path = __DIR__.'..\..\txt/'.$_POST["file"];

			$fileDatos = file($path);

			$uno = array_key_first($fileDatos);
			$ultimo = array_key_last($fileDatos);

			// return $uno.'--'.$ultimo;

			foreach ($fileDatos as $num_linea => $linea) {

				if($num_linea != $uno && $num_linea != $ultimo ){


					$mPago = substr($linea,0,4);
					$identificador = substr($linea,4,21);
					$nTrans = substr($linea,52,15);
					$fecha = substr($linea,67,8);
					$importe = substr($linea,302,12);
					$decimal= substr($linea,314,2);

					if ( empty(trim($importe)) ){

						$importe_format = 0.00;

					}else{

						$importe_format = $importe.'.'.$decimal;

					}

					$datos = array(
						"mPago" =>  $mPago,
						"identificador" => $identificador,
						"nTrans" => $nTrans,
						"fecha" => $fecha,
						"importe" => $importe_format
					);

					$pagos = ModeloPagoDirecto::mdlIngresarPago($datos);

					// print_r($datos);

				}
				
			}

			return $pagos;

			if($pagos == "ok"){

				$name = $_POST["file"];

				$fileUpdate = ControladorArchivos::ctrEditarArchivo($name);

				if($fileUpdate == "ok"){

					return "ok";

				}else{

					return "error archivo";
				}

			}else{

				return $pagos;

			}

		}

	}

	
}
	


