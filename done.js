
const GetGains = {
	leyend: 120,
	magnificent: 65,
	excelent: 25,
	perfect: 15,
	good: 10,
	additional: 1.2,
	bad: 0,

	triesAdditional: function(){
		if (tries == 0) {
			return 0;
		}else if (tries == 1) {
			return 1;
		}else if (tries <= 3) {
			return 0.8;
		}else if (tries <= 10) {
			return 0.6;
		}else if (tries <= 25) {
			return 0.3;
		}else if (tries <= 50) {
			return 0.1;
		}else{
			return 0;
		}
	},
	
	exp: function(job){

		let expAdditional = (StatsPerfect(jobSelected()).jobSelect == true) ? this.additional : 1;

		switch(StatsPerfect(job).value){
			case 0:
				return this.bad;
				break;
			case 1:
				return Math.round(this.excelent * (expAdditional + this.triesAdditional()));
				break;
			case 2:
				return Math.round(this.perfect * (expAdditional + this.triesAdditional()));
				break;
			case 3:
				return Math.round(this.good * (expAdditional + this.triesAdditional()));
				break;
		}

	},

	mesos: function(job){

		const randomMesos = function(min, max){
			return Math.floor(Math.random() * (max - min)) + min;
		};


		let mesosAdditional = (StatsPerfect(jobSelected()).jobSelect == true) ? this.additional + 2.5 : 1;

		switch(StatsPerfect(job).value){
			case 0:
				return this.bad;
				break;
			case 1:
				return Math.round(randomMesos(15, this.excelent) * (mesosAdditional + this.triesAdditional()) );
				break;
			case 2:
				return Math.round(randomMesos(5, this.perfect) * (mesosAdditional + this.triesAdditional()));
				break;
			case 3:
				return Math.round(randomMesos(1, this.good) * (mesosAdditional + this.triesAdditional()));
				break;
		}

	}
};


function cellStats(job){
	let mesosObtained = GetGains.mesos(jobSelected());
	Mesos.Set(mesosObtained);
	return "<tr><td><img src='img/job/" + job + ".png' alt='" +  job +"' title='"+ job+"'></td> <td>"+ Stats.STR + "</td> <td>"+ Stats.DEX +"</td> <td>"+ Stats.INT + "</td> <td>" + Stats.LUK + "</td><td>" + GetGains.exp(jobSelected()) + "</td> <td>" + tries + "</td> <td><img src='" +  Mesos.typeAssigned(mesosObtained) + "' alt='" + mesosObtained + "' title=' "+ mesosObtained + "'></td> </tr>";	
}

function Done(){
	ProgressUser.expUser += GetGains.exp(jobSelected());

	document.getElementById('tableBody').innerHTML += cellStats(jobSelected());
	document.getElementById('selectJob').removeAttribute("disabled");
	document.getElementById('selectJob').removeAttribute("class");

	document.getElementById('btn_done').setAttribute("disabled", "disabled");
	document.getElementById('btn_done').setAttribute("class", "btn_doneStyle");

	ProgressUser.update();
	ProgressUser.show();
	Ranking.show();
	tries = 0;
}

const btn_done = document.getElementById('btn_done');

btn_done.onclick = function(){
	Done();	
	snd_MouseClick.play();
}
btn_done.onmouseover = function(){
	snd_MouseOver.play();
};

