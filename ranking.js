const Ranking = {	

	get: function(){
		$.post("post.php", {ranking: ''}, function(data){
			document.getElementById('Table-ranking-row').innerHTML = data;
		});
	},

	position: function(){
		$.post("post.php", {positionRanking: ''}, function(position){
			document.getElementById('positionRanking').innerHTML = position;
			console.log(position);
		});
	},

	show: function(){
		this.get();	
		//this.position();
	}
}
Ranking.show();