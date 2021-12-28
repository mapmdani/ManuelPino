<?php
 
class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

			   	$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			   	// $encriptar = $_POST["ingPassword"];

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

					if($respuesta["estado"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["perfil"] = $respuesta["perfil"];


						setcookie("userSession", $respuesta["usuario"]);

						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Argentina/Buenos_Aires');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$user = $_SESSION["id"];

						$item = "id_usuario";
						$valor = $user;
						$valideToken = ModeloUsuarios::MdlValidarToken($item, $valor);

						if($valideToken["Token"]){

							$item = "Id";
							$valor = $valideToken["Id"];

							$blockToken = ModeloUsuarios::MdlInactivarToken($item, $valor);

						}

						$val = true;
						$token = bin2hex(openssl_random_pseudo_bytes(16,$val));

						$datos = array("id"=>$user,
										"token"=>$token,
										"estado"=> "activo",
										"fecha" => $fechaActual);

						$validar = ModeloUsuarios::mdlUserTokenWmp($datos);

						// print_r($validar);
						// die;

						if($validar == "ok"){


							$item1 = "ultimo_login";
							$valor1 = $fechaActual;

							$item2 = "id";
							$valor2 = $respuesta["id"];

							$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

							if($ultimoLogin == "ok"){

								setcookie("wMp", $token,"",time()+28800);

								echo '<script>

										window.location = "home";

									 </script>';

							}
						}else{

							echo '<br>
							<div class="alert alert-danger">Error, vuelve a intentarlo</div>';
							
						}
						
					}else{

						echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';

					}		

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}

			}	

		}

	}
	
	/*=============================================
		FORGOT PASSWORD
	=============================================*/

	static public function ctrForgotPassword (){
		if (isset($_POST['email'])) {
	
			//echo($_POST['email']);
			$tabla = "usuarios";
			$column = "correo";
			$valor = $_POST['email'];

			$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $column, $valor);
			//print_r($respuesta);
			
			if($respuesta['correo'] === $_POST['email']){

				$user = $respuesta['id'];
				$item = "id_usuario";
				$valor = $user;
				$valideToken = ModeloUsuarios::MdlValidarToken($item, $valor);
				
				if($valideToken["Token"]){

					$item = "Id";
					$valor = $valideToken["Id"];

					$blockToken = ModeloUsuarios::MdlInactivarToken($item, $valor);
					
					/* envio de email */

					$res = EmailReset::emResetPassword($_POST['email']);				
				
				}
				
			}else{
				echo"no existe";
			}
		}
	}

	/*=============================================
		RECOVER PASSWORD
	=============================================*/

	static public function ctrRecoverPassword(){
		
		if(!empty($_POST['password']) && !empty($_POST['confirmPassword']) ){

			$tabla = "usuarios";
			$item2 = "id";
			$id = 61;

			$encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			
			$item = "password";

			$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item ,$encriptar,$item2, $id);

			echo $respuesta;
		}
		
	}
}
	


