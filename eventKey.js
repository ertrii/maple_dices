
window.addEventListener("keyup", function(e){	
	if (e.code == 'ArrowUp') {
		startDice();
		snd_MouseClick.play();
	}else if (e.code == 'Space') {
		Done();
		snd_MouseClick.play();
	}
	
});