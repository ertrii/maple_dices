<?php
session_start();
include_once 'user.php';

if (isset($_POST['setLv'])) {
	User::update('level', $_POST['setLv']);
}

if (isset($_POST['setExp'])) {
	User::update('exp', $_POST['setExp']);
}

if (isset($_POST['setMesos'])) {
	User::update('mesos', $_POST['setMesos']);
}


if (isset($_POST['getLv'])) {
	echo User::select('level');
}

if (isset($_POST['getExp'])) {
	echo User::select('exp');
}

if (isset($_POST['getMesos'])) {
	echo User::select('mesos');
}

if (isset($_POST['getOnline'])) {
	echo User::Online();
}

if (isset($_POST['ranking'])) {	
	$abc = User::ranking();
	$row = '';
	$count = 1;
	foreach ($abc as $b) {
		$row .= "<tr><td scope='row'> ". $count ." </td><td>". $b[0]. "</td><td> " . $b[1]."</td> <td>" . $b[2] ."</td></tr>";
		$count++;
	}
	echo $row;
}

if (isset($_POST['positionRanking'])) {
	echo (User::positionRanking($_SESSION['user'])[3]);
}