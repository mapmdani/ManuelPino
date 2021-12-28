<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	CREAR USUARIO
	=============================================*/	

	public $nuevoNombre;
	public $nuevoUsuario;
	public $nuevoPassword;
	public $nuevoPerfil;
	public $nuevaFoto;
	
	public function ajaxCrearUsuario(){
		
		$valor = array("nuevoNombre" =>  $this->nuevoNombre,
					   "nuevoUsuario" =>  $this->nuevoUsuario,
					   "nuevoPassword" =>  $this->nuevoPassword,
					   "nuevoPerfil" =>  $this->nuevoPerfil,
					   "nuevaFoto" =>  $this->nuevaFoto);

		$respuesta = $valor;
		// $respuesta = ControladorUsuarios::ctrCrearUsuario($valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;


	public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){
	

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}

/*=============================================
GUARDAR USUARIO
=============================================*/

if(isset( $_POST["nuevoUsuario"])){

	$crearUsuario = new AjaxUsuarios();
	$crearUsuario -> nuevoNombre = $_POST["nuevoNombre"];
	$crearUsuario -> nuevoUsuario = $_POST["nuevoUsuario"];
	$crearUsuario -> nuevoPassword = $_POST["nuevoPassword"];
	$crearUsuario -> nuevoPerfil = $_POST["nuevoPerfil"];
	$crearUsuario -> nuevaFoto = $_POST["nuevaFoto"];
	$crearUsuario -> ajaxCrearUsuario();

}