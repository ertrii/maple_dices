<?php
/**
* 
*/
include_once 'includes/filtro.php';
include_once 'includes/conexion.php';

class User
{	
	//Verificando si el usuario en existe...
	public static function exists($user){
		$consult = Conexion::dataBase("SELECT user FROM user WHERE user = '$user'");
		$get = $consult->fetch_array();
		return (isset($get['user'])) ? true : false ;
	}

	//Registrando usuarios
	public static function register($user, $pass){
		$user = Filtro::clean($user, 'user');
		if (self::exists($user) == false) {
			$pass = Filtro::clean($pass, 'pass');
			$prueba= Conexion::dataBase("INSERT INTO user(user, pass) VALUES ('$user', '$pass')");
			return ($prueba === true) ? true : false ;
		}else{
			return false;
		}
		
	}

	//Logeando usuario.
	public static function login($user, $pass){		
		$user = Filtro::clean($user, 'user');
		$consult = Conexion::dataBase("SELECT user, pass FROM user WHERE user = '$user'");
		$data = $consult->fetch_array();
		return (Filtro::clean($pass, 'pass') == $data['pass']) ? true : false ;
	}

	//Seleccionando Datos
	public static function select($row){
		$data = Conexion::dataBase("SELECT $row FROM user WHERE user = '" . $_SESSION['user'] ."'");
		$get = $data->fetch_array();
		return $get[$row];
	}	

	//Acctualizando en la base de datos
	public static function update($row, $data){
		$consult = Conexion::dataBase("UPDATE user SET $row = '$data' WHERE user = '" . $_SESSION['user'] . "'");
		return ($consult == true) ? true : false ;
	}

	//Actualizando si el usuario esta on o off
	public static function loggedin($state){
		if ($state === true) {
			self::update('loggedin', 1);
		}else{
			self::update('loggedin', 0);
		}		
	}

	//Contando los usuarios online
	public static function Online(){

		$consult = Conexion::dataBase("SELECT COUNT(loggedin) FROM user WHERE loggedin = 1");
		$count = $consult->fetch_array();
		return $count[0];

	}

	//Devolviendo a los 10 primeros puestos en el ranking
	public static function ranking(){
		$data = Conexion::dataBase("SELECT user, level, exp FROM user ORDER BY level DESC, exp DESC LIMIT 10");
		return $data->fetch_all();
	}

	public static function positionRanking($user){
		$position = Conexion::dataBase("SELECT user, level, exp, (SELECT COUNT(*)+1 FROM user AS A WHERE B.level < A.level AND B.exp < A.exp) AS position FROM user AS B WHERE user = '$user' ORDER BY position");
		return $position->fetch_array();
	}
}