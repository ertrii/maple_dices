<?php
class Verify
{
	private $conexion;
	function __construct($dataBase)
	{
		$this -> conexion = $dataBase;
	}
	public function userExists($name){
		$users = $this-> conexion ->open-> query("SELECT * FROM usuario WHERE nombre = '$name'");
		$user = $users->fetch_array();
		return ($name == $user['nombre']) ? true : false ;
	}
}