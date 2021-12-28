<?php

class Conexion{

	static public function conectar(){

		$dsn = 'mysql:host=localhost;dbname=cobro_digital';
		$username = 'root';
		$password = '';
		$options = [];

		$link = new PDO($dsn, $username, $password, $options);
		$link->exec("set names utf8");

		return $link;

	}

}
