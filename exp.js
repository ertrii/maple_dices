
const Exp = [1, 15, 34, 57, 92, 135, 372, 560, 840, 1242, 1144, 1573, 2144, 2800, 3640, 4700, 5893, 7360, 9144, 11120, 13477, 16268, 19320, 22880, 27008, 31477, 36600, 42444, 48720, 55813, 63800, 86784, 98208, 110932, 124432, 139372, 155865, 173280, 192400, 213345];

const ProgressUser = {
	level: 1,
	expUser: 0,	
	setDataBase: function(){
			$.post("post.php", {setLv: this.level, setExp: this.expUser}, function(data){} );			
		},
	update: function() {
		
		while (this.expUser >= Exp[this.level]){
			this.expUser -= Exp[this.level];
			this.level++;			
		}		

		this.setDataBase();

	},

	getDataBase: function(){
		$.post("post.php", {getLv: ''}, function(lv){
			ProgressUser.level = parseInt(lv);
			
		});
		$.post("post.php", {getExp: ''}, function(exp){
			ProgressUser.expUser = parseInt(exp);
		});
	},

	show:function(){
		document.getElementById('levelChar').innerHTML = this.level;
		document.getElementById('expObtained').innerHTML = this.expUser;
		document.getElementById('expRequired').innerHTML = '/' + Exp[this.level] + ' | ';
		document.getElementById('porcentExpObtained').innerHTML = Math.round((this.expUser/Exp[this.level] * 100)) + "%";

		document.getElementById('barra').style.width = (this.expUser/Exp[this.level] * 100) + "%";		
		Mesos.show();
	},

	getExp: function(){
		return this.expUser;
	}

}

//Obteniendo los datos de la base de datos
ProgressUser.getDataBase();

// Mostrando en la web los datos del usuario
/*$(document).ready(function(){
	ProgressUser.show();
});*/
