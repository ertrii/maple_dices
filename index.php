<?php
session_start();

include_once 'user.php';
include_once 'includes/alert.php';

$alertRegister = new Alert();
$alertSession = new Alert();

if (isset($_POST['sb_register'])) {
	if ($_POST['rg_user'] == '' || $_POST['rg_pass'] == '' || $_POST['rg_rPass'] == '') {
		$alertRegister->danger('input', 0);
	}else{		
		if ($_POST['rg_pass'] == $_POST['rg_rPass']) {			

			switch (User::register($_POST['rg_user'], $_POST['rg_pass'])) {
				case true:
					$_SESSION['user'] = $_POST['rg_user'];
					User::loggedin(true);
					break;
				
				default:					
					$alertRegister->danger('register', 0);
					break;
			}
		}else{			
			$alertRegister->danger('register', 1);
		}
	}
}

if (isset($_POST['sb_session'])) {
	if ($_POST['s_user'] == '' || $_POST['s_pass'] == '') {		
		$alertSession->danger('input', 0);
	}else{
		if (User::login($_POST['s_user'], $_POST['s_pass']) === true) {
			$_SESSION['user'] = $_POST['s_user'];
			User::loggedin(true);
			header('Location: index.php');
		}else{
		  $alertSession->danger('session', 0);//Preparando para la impresion
		
		}
	}
}

if (isset($_POST['exit'])) {	
	User::loggedin(false);
	session_destroy();
	header('Location: index.php');
}

if (empty($_SESSION['user'])) {	
	include_once 'enter.php';
}else{
	include_once 'game.php';
}
