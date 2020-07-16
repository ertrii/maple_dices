
const Mesos = {	

	Get: 0, //Mostrar los mesos que tiene actualmente

	Type: {
		money: "img/mesos/money.png",
		moneyGold: "img/mesos/money_gold.png",
		bill: "img/mesos/bill.png",
		goldBag: "img/mesos/gold_bag.png"
	},

	typeAssigned: function(mesos) {
		if (mesos < 50) {
			return this.Type.money;
		}else if (mesos < 100) {
			return this.Type.moneyGold;
		}else if(mesos < 1000){
			return this.Type.bill;
		}else{
			return this.Type.goldBag;
		}
	},

	Set: function(mesos){
		this.Get += mesos;
		$.post("post.php", {setMesos: this.Get}, function(data){});
	},

	getDataBase: function(){
		$.post("post.php", {getMesos: ''}, function(data){
			Mesos.Get = parseInt(data);
		});
	},

	show: function(){		
		document.getElementById('myMesos').innerHTML = this.Get;
	}

}

Mesos.getDataBase();