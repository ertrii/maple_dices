
function Sound(music){
	this.music = music;
	this.power = true;

	this.on = function(){
		this.power = true;
	};

	this.off = function(){
		this.power = false;
	};
	this.play = function(){
		if (this.power == true) {
			this.music.load();
			this.music.play();
		}else{
			console.log("Audio OFF");
		}
		
	};
}

const snd_MouseClick = new Sound(document.getElementById('snd_btnMouseClick'));
const snd_MouseOver = new Sound(document.getElementById('snd_btnMouseOver'));