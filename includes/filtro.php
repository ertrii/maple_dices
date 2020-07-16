<?php
class Filtro{
	public static function clean($dato, $type){
		switch ($type) {
			case 'user':
				$dato = strtolower((trim($dato)));
				break;
			case 'pass':
				$dato = sha1(trim($dato));
				break;
			case 'mail':
				$dato = filter_var(trim($dato), FILTER_VALIDATE_EMAIL);
				break;
			case 'text':
				$dato = trim($dato);
				break;
			default:
				$dato = trim($dato);
				break;
		}
		return $dato;
	}		

	public static function hex2rgb($hex) {
	  	

	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   //return implode(",", $rgb); // returns the rgb values separated by commas
	   return $rgb; // returns an array with the rgb values
	}
	
	public static function check_hex($hex){
		if (substr($hex, 0, 1) != "#") {
		 	$hex = "#" . $hex;
		}

		if (strlen($hex) == 4 || strlen($hex) == 7) {
			return $hex;
		}else{
			return "error";
		}	
		//strrpos() 
	}
}