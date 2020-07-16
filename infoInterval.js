setInterval(function(){
	$.post("post.php", {getOnline: ''}, function(data){
		document.getElementById('numOnline').innerHTML = data;
		//console.log(data);
	});
}, 1000);