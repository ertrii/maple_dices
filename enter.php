<!DOCTYPE html>
<html>
<head>
	<title>MapleStats - Session</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/session.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container">
	
	<form method="post" id="session">

		<div class="titlePage title-1">
			<h1>MapleStats</h1>
			<h3>SESSION</h3>
		</div>
		<div class="form-group">
			<input type="text" name="s_user" placeholder="User" class="form-control">
		</div>
		<div class="form-group">
			<input type="password" name="s_pass" placeholder="Password" class="form-control">
		</div>
		<?php $alertSession->show(); ?>	
		<input type="submit" name="sb_session" value="GO GAME" class="btn btn-primary" >		
	</form>
		
	<form method="post" id="register">
		<div class="titlePage title-2">
			<h3>REGISTER</h3>
		</div>
		<div class="form-group">
			<input type="text" name="rg_user" placeholder="nick" class="form-control">
		</div>
		<div class="form-group">
			<input type="password" name="rg_pass" placeholder="password" class="form-control">
		</div>
		<div class="form-group">
			<input type="password" name="rg_rPass" placeholder="password repeat" class="form-control">
		</div>
		<?php $alertRegister->show(); ?>
		<input type="submit" name="sb_register" class="btn btn-primary" value="REGISTER">
	</form>
</div>

</body>
</html>