/*

--- Designed by Churano/ertrii
--- Date: 02/10/2017
--- All right reserved by autor original.

*/

var Stats = {STR: 4, DEX: 4, INT: 4, LUK: 4};

var tries = 0;

var jobSelected = function(){
	let i = document.getElementById('selectJob').options.selectedIndex;	
	return document.getElementById('selectJob').options[i].text.toLowerCase();	
}
function StatsPerfect(job){

	let ItsJob = {jobSelect: true, value: 0, info: "Stats no recomended"};

	switch(job){			

		case 'warrior':
		case 'bowman':
		case 'pirate':

			ItsJob.jobSelect = true;

			if (Stats.LUK == 5 && Stats.INT == 5) {
				ItsJob.value = 3;
				ItsJob.info = "Good";
			}else if (Stats.LUK == 4 && Stats.INT == 5 || Stats.LUK == 5 && Stats.INT == 4) {
				ItsJob.value = 2;
				ItsJob.info = "Perfect!";
			}else if (Stats.LUK == 4 && Stats.INT == 4) {
				ItsJob.value = 1;
				ItsJob.info = "Excelent!!!";
			}else{
				ItsJob.value = 0;
			}

			break;

		case 'magician':

			ItsJob.jobSelect = true;
			
			if (Stats.STR == 5 && Stats.DEX == 5) {
				ItsJob.value = 3;
				ItsJob.info = "Good.";
			}else if (Stats.STR == 4 && Stats.DEX == 5 || Stats.STR == 5 && Stats.DEX == 4) {
				ItsJob.value = 2;
				ItsJob.info = "Perfect!";
			}else if (Stats.STR == 4 && Stats.DEX == 4) {
				ItsJob.value = 1;
				ItsJob.info = "Excelent!!!";
			}else{
				ItsJob.value = 0;
			}

			break;

		case 'thief':

			ItsJob.jobSelect = true;

			if (Stats.STR == 5 && Stats.INT == 5) {
				ItsJob.value = 3;
				ItsJob.info = "Good";
			}else if (Stats.STR == 4 && Stats.INT == 5 || Stats.INT == 5 && Stats.INT == 4) {
				ItsJob.value = 2;
				ItsJob.info = "Perfect!";
			}else if (Stats.STR == 4 && Stats.INT == 4) {
				ItsJob.value = 1;
				ItsJob.info = "Excelent!!!";
			}else{
				ItsJob.value = 0;
			}				

			break;

		default:

			ItsJob.jobSelect = false;

			if (Stats.STR <= 5 && Stats.DEX <= 5) {				

				if (Stats.STR == 5 && Stats.DEX == 5) {
					ItsJob.value = 3;
					ItsJob.info = "Stats good for Magician.";
				}else if (Stats.STR == 4 && Stats.DEX == 5 || Stats.STR == 5 && Stats.DEX == 4) {
					ItsJob.value = 2;
					ItsJob.info = "Stats perfect for Magician.";
				}else {
					ItsJob.value = 1;
					ItsJob.info = "Stats Excelent for Magician!!!.";
				}

			}else if (Stats.INT <= 5 && Stats.LUK <= 5) {

				if (Stats.LUK == 5 && Stats.INT == 5) {
					ItsJob.value = 3;
					ItsJob.info = "Stats good for Warrior, Bownmas and Pirare.";
				}else if (Stats.LUK == 4 && Stats.INT == 5 || Stats.LUK == 5 && Stats.INT == 4) {
					ItsJob.value = 2;
					ItsJob.info = "Stats perfect for Warrior, Bownmas and Pirare.";
				}else {
					ItsJob.value = 1;
					ItsJob.info = "Stats Excelent for Warrior, Bownmas and Pirare!!!.";
				}

			}else if (Stats.STR <= 5 && Stats.INT <= 5) {

				if (Stats.STR == 5 && Stats.INT == 5) {
					ItsJob.value = 3;
					ItsJob.info = "Stats good for Tief.";
				}else if (Stats.STR == 4 && Stats.INT == 5 || Stats.INT == 5 && Stats.INT == 4) {
					ItsJob.value = 2;
					ItsJob.info = "Stats perfect for Tief.";
				}else {
					ItsJob.value = 1;
					ItsJob.info = "Stats Excenlent for Tief!!!.";
				}

			}else{
				ItsJob.info = "Stats no recomended.";
			}			

			break;
	}

	return ItsJob;

}
function getRandomStats(){
		
	Stats.STR = Math.floor(Math.random() * (16 - 4)) + 4;
	document.getElementById('setSTR').innerHTML = Stats.STR;
	Stats.DEX = Math.floor(Math.random() * (16 - 4)) + 4;
	document.getElementById('setDEX').innerHTML = Stats.DEX;
	Stats.INT = Math.floor(Math.random() * (16 - 4)) + 4;
	document.getElementById('setINT').innerHTML = Stats.INT;
	Stats.LUK = Math.floor(Math.random() * (16 - 4)) + 4;
	document.getElementById('setLUK').innerHTML = Stats.LUK;

	return StatsPerfect(jobSelected()).info;
	
}


function saveStats(){
	tries = 0;
	return "Save";
}

getRandomStats();

function startDice(){
	let numImg = 1;
	let endInterval = false;
	var randomStats = setInterval(function(){				
		let info = getRandomStats();
		document.getElementById('infoStats').innerHTML = info;				
		document.getElementById('btn_diceImg').src = "img/dice2/"+ numImg + ".png";		
		if (endInterval == true) {
			clearInterval(randomStats);
		}
		numImg++;
		if (numImg > 3) {
			numImg = 0;
			endInterval = true;
		}		
	}, 100);	
	
	document.getElementById('selectJob').setAttribute("disabled", "disabled");
	document.getElementById('selectJob').setAttribute("class", "selectColor");

	document.getElementById('btn_done').removeAttribute("disabled");
	document.getElementById('btn_done').removeAttribute("class");

	document.getElementById('infoCharJob').innerHTML = jobSelected();
	tries++;
}
const btn_dice = document.getElementById('btn_diceImg');

btn_dice.onclick = function() {
	startDice();
	snd_MouseClick.play();
};

btn_dice.onmouseover = function(){
	snd_MouseOver.play();
}
