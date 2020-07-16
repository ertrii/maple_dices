<!DOCTYPE html>
<html>
<head>
	<title>Stats</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleStats.css">
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
	<div class="navbar navbar-light bg-light">
		<div class="container">
			<a href="index.php" class="navbar-brand">
				<img src="img/Maple_nav_icon.png" alt="MapleStats" width="30" height="30">
				MapleStats
			</a>
			<form method="post" class="form-inline">
				<div class="Online mr-3">
					<span id="numOnline">--</span>
					<span>Online</span>
				</div>
				<input type="submit" name="exit" value="Logout" class="btn btn-outline-info">
			</form>
		</div>
		
	</div>
	<div class="container">		
		<div class="row border border-dark mt-2 game-main bg-light">
			
		
			<div class="col-sm col-md-7 col-xl-9 pt-4">
				<div class="d-flex flex-column align-items-center">
					<div class="selectJob">
						<label id="text" for="selectJob">Select Job</label>
						<select name="job" id="selectJob">
							<option value="all">All</option>
							<option value="warrior">Warrior</option>
							<option value="archer">Bowman</option>
							<option value="magician">Magician</option>
							<option value="tief">Thief</option>
							<option value="pirate">Pirate</option>
						</select>
					</div>
					<div class="formStats">
						<h3 id="lvChar">Lv. <span id="levelChar">--</span></h3>
						<p id="nameUser"><?php if (class_exists('User')){echo(User::select('user'));}else{ header("Location: index.php");}?></p>
						<div class="infoChar">
							<p class="text" id="infoCharJob">--</p>
							<p class="text" id="positionRanking"><?php echo (User::positionRanking($_SESSION['user'])[3]); ?></p>
							<p class="text">--</p>
						</div>				
						
						<div class="colStats">
							<div class="colStat1">
								<p id="setSTR">--</p>
								<p id="setDEX">--</p>
							</div>
							<div class="colStat2">
								<p id="setINT">--</p>
								<p id="setLUK">--</p>
							</div>
						</div>
						
						<div id="dice">
							<div id="btn_dice">
								<img id="btn_diceImg" src="img/dice2/0.png" alt="dice">
							</div>
							
						</div>

					</div>

				</div>				

				<div class="infoFormStats">
					<p id="infoStats">Click in the Dice</p>
					<button id="btn_done">DONE</button>
				</div>

				<div>				
					<table id="tableStatsSave" class="table table-striped">
						<thead>
							<tr>
								<th>job</th>
								<th>str</th>
								<th>dex</th>
								<th>int</th>
								<th>luk</th>
								<th>Exp</th>			
								<th>Tries</th>
								<th>Mesos</th>
							</tr>
						</thead>
						<tbody id="tableBody"></tbody>
					</table>
				</div>
			</div>

			
			<div class="info-game col-sm col-md-5 col-xl-3"><!--bg-dark text-white-->
		
				<div class="mapleInfo pt-3 pb-3">
					<img src="img/Maple_nav_icon.png" alt="MapleStats" width="30" height="30">
					MapleInfo
				</div>				
				<div class="user-mesos">
					<h5>Your Mesos:</h5>
					<i><img src="img/mesos/gold_bag.png"></i>
					<span id="myMesos" class="bg-warning p-1 rounded">--</span>
				</div>
				<div class="ranking mt-4">
					<h5>Ranking</h5>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Nick</th>
								<th>Lv.</th>
								<th>Exp</th>
							</tr>							
						</thead>						
						<tbody id="Table-ranking-row">
							<!--Por aquí será escrito por ranking.js-->
						</tbody>
					</table>
				</div>
				
				<div class="tuto">
					<h5>Guide</h5>
					<div class="tuto-info">
						<p>Logra Stats perfecto, guarda y gana mesos y exp.</p>
						<p>Warrior, Bownman y Pirate: no requiere INT y LUK</br>Magician: no requiere DEX y STR</br>Tief: no requiere STR y INT</p>
						<p>Los Stats que no se requiere tedrás que lograr un 4-4 y generaras buenas ganancias tambien puedes un 4-5 o viceversas pero no lograras tanto que la anterior mencionada.</p>
						<p>Si seleccionas All entonces tendrás mas oportunidad de lograr un 4-4 en cualquiera de los jobs pero la recompensa no va ser mayor que un job selecionado.</p>
					</div>
					
					<h6>Atajos</h6>
					<div class="tuto-atajos">
						<div>
							<img src="img/key/top.png" alt="flecha arriba">
							<p>Move Dice</p>
						</div>
						<div>
							<img src="img/key/space.png" alt="Espacio">
							<p>Done</p>
						</div>
					</div>
					
					
				</div>
			</div>				
			
		</div>
		<div class="row buy-Items">
			<h5>Dejen cargar la pagina o F5</h5>
		</div>		
	</div>
	
	<audio src="sound/effects/btnMouseClick.mp3" id="snd_btnMouseClick"></audio>
	<audio src="sound/effects/btnMouseOver.mp3" id="snd_btnMouseOver"></audio>

	<div class="expChar">
		<p>Exp: <i id="expObtained">0</i><span id="expRequired"> / 15</span> <b id="porcentExpObtained">0%</b></p>
		<div id="barra"></div>
	</div>
<script type="text/javascript" src="sound.js"></script>
<script type="text/javascript" src="ranking.js"></script>
<script type="text/javascript" src="mesos.js"></script>
<script type="text/javascript" src="exp.js"></script>
<script type="text/javascript" src="stats.js"></script>
<script type="text/javascript" src="done.js"></script>
<script type="text/javascript" src="eventKey.js"></script>
<script type="text/javascript" src="infoInterval.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		const loadingDoom =setInterval(function(){
			let timeInterval = 0;
			ProgressUser.show();
			Mesos.show();
			if (timeInterval > 1) {
				clearInterval(loadingDoom);
			}
			timeInterval++;
		}, 1000);
		
	});
	
</script>
</body>
</html>