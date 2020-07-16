<?php

/**
* 
*/

class Conexion{
	
	private static $msg;

	public static function console(){
		echo '<script> console.log ("'. self::$msg .'");</script>';
	}

	public static function dataBase($query){

		include_once 'config.php';

		$dB = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if ($dB->connect_errno) {
			echo "Error en la conexion";
			exit();
		}else{
			self::$msg = 'conexion establecida...';
			return $dB->query($query);
			
		}

	}
}