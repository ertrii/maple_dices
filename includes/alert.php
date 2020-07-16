<?php

class Alert
{
	private $textAlert = '';//Guardando impresión

	private $typeAlert = 'primary'; //Por defecto será Primery el Alert...

	//Asignar etiqueta html, si se desea: true sino false
	public $HTML = true;

	//Preparando impresion con etiqueta o sin ella...
	private function label($text){
		return ($this->HTML === true) ? '<div class="alert alert-' . $this->typeAlert . '">' . $text . '</div>' : $text ;

	}

	private function info($type){

		switch ($type) {
			case 'primary':
				return array('input' => array('....', '...'),
						'session' => array('...', '...'),
						'register' => array('...', '...'));
				break;
			case 'danger':
				return array('input' => array('Complete los campos vacíos',// 0
											'Solo textos y números por favor'), // 1

						'session' => array('Usuario o Contraseña inválida', // 0
										'Esta cuenta a sido baneada'), // 1

						'register' => array('Este usuario ya existe', // 0
										'No coíncide las contraseñas')); // 1
				break;
			case 'warning':
				return array('input' => array('Complete los campos vacíos', 'Solo textos y números por favor'),
						'session' => array('Usuario o Contraseña inválida', 'Esta cuenta a sido baneada'),
						'register' => array('Este usuario ya existe', 'No coíncide las contraseñas'));
				break;
			default:
				return array('input' => array('Ups...', 'Error'));
				break;
		}
				
	}

	/*	
	// Ejecutando el tipo de Alert que se va imprimir
	// Parametro $for_: alerta a algo especifico
	// Parametro $i: indice del parametro $for_
	*/
	public function primary($for_, $i){
		$this->typeAlert = 'primary';
		$this->textAlert = $this->label($this -> info('primary')[$for_][$i]);
	}

	public function danger($for_, $i){
		$this->typeAlert = 'danger';
		$this->textAlert = $this->label($this -> info('danger')[$for_][$i]);
		
	}

	public function warning($for_, $i){
		$this->typeAlert = 'warning';
		$this->textAlert = $this->label($this -> info('warning')[$for_][$i]);
	}

	//Imprimiendo...
	public function show(){
		echo $this->textAlert;
	}
	
}