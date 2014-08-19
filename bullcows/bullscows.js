(function () {
	require.config({
		paths : {			
			jQuery : "./Scripts/libs/jquery-2.1.1.min",
			Game : "./Scripts/game/Game",
			ratingsValues :"./Scripts/data/ratingsValues",
			Timer : "./Scripts/game/Timer",
			numberUtils : "./Scripts/game/numberUtils",
			underscore : "./Scripts/libs/underscore-min",
			GameInterface : "./Scripts/game/GameInterface"
		},shim: {      
			jQuery : {
				exports: "$"
			}
		}
	});
	require(["jQuery","Game","ratingsValues","GameInterface"],function($,Game,ratingsValues,GameInterface){		
		var $div = $("<div/>");
		GameInterface.init(document.body);
		var game = new Game(GameInterface);	
		$newGameBtn = $("#newGameBtn").on("click",function() {
			game.restart();
		});
	});
}());	
	
	
	
		