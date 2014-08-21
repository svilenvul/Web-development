define("GameInterface",["jQuery","Timer"],function ($,Timer) {
	var GameInterface;
	GameInterface = (function () {
		
		var newGameBtnID = "newGameBtn";
		var checkBtnID = "checkBtn";
		var playerInputID = "playerInput";
		var numberID = "number";
		var timer = new Timer();
		
		function init (container) {
			var $container = $(container);			
			
			
			(function createHistory () {
				$div = $("<div/>").attr("class","tab").attr("id","history");;
				var $ul = $("<ul />");
				
				for (var i = 0; i < 7; i++) {
					var $li = $("<li/>").attr("id","guess"+ (i + 1));
					$li.appendTo($ul);					
				}
				
				$ul.appendTo($div);
				$div.appendTo($container);			
			}());
			(function createControlPanel () {
				var $div,$span,$input,$checkBtn,$newGameBtn; 
				
				$div = $("<div/>").attr("class","tab").attr("id","controlPanel");
				
				$span  = $("<span />").attr("id",numberID);
				$span.html ("????");
				
				$input = $("<input />").attr("id",playerInputID);
				$input.attr("maxlength",4);
				
				$checkBtn = $("<button />").attr("id",checkBtnID);
				$checkBtn.html ("check");
					
				$newGameBtn = $("<button />").attr("id",newGameBtnID);
				$newGameBtn.html("newGame");
				
				$div.append($span,$input,$checkBtn,$newGameBtn,timer.container);
				$container.append($div);
			}());
			(function createHighScoreTable() {
				$div = $("<div/>").attr("class","tab").attr("id","hisghScore");
				var $ul = $("<ul />");
				
				for (var i = 0; i < 10; i++) {
					var $li = $("<li/>").attr("id","highScore"+ (i + 1));					
					$li.appendTo($ul);					
				}
					
				$ul.appendTo($div);
				$div.appendTo($container);
			}());
			
			var highScore;
			if (localStorage.getObject("HighScore") === null) {
				highScore = [];				
			} else {
				highScore = localStorage.getObject("HighScore");
			}
			loadHighScore(highScore);
			timer.start();
		}
		
		function addToHistory (id,result) {
			$("#guess" + id).html(result.number.toString() + " cows: " + result.cows + ", bulls: " + result.bulls);
		}
		
		function clear () {
			$("#history li").html("");
			$("#" + playerInputID).val("");
			$("#" + numberID).html("????");
			$("#" + checkBtnID).html("check");
			$("#messege").remove();
			$("#" + playerInputID).attr("maxlength","4");
		}
		
		function revealNumber(numberString) {
			console.log(numberString);
			$("#" + numberID).html(numberString);
		}
		
		function loadHighScore (highScores){			
			for (var i = 0; i < 10; i++) {
				var currentScore = highScores[i];
				if(!currentScore) {
					currentScore = {
						name:"unkhnow",
						score:"..."
						};
				} else {
					currentScore = highScores[i]
				}
				$("#highScore" + (i + 1)).html(currentScore.name + " : " + currentScore.score);		
			}
		}	
		function enterName(score) {
			var $messege = $("<span/>").html("Score: " + score + " .Enter name: ").attr("id","messege");
			$("#controlPanel").append($messege);
			var $checkBtn = $("#"+checkBtnID);
			$checkBtn.html("Enter");
			$("#" + playerInputID).attr("maxlength","10");
		}	
		
		return {			
			newGameBtnID : newGameBtnID,
			checkBtnID : checkBtnID,
			playerInputID : playerInputID,
			addToHistory : addToHistory,
			clear: clear,		
			init : init,
			timer : timer,
			revealNumber : revealNumber,
			loadHighScore : loadHighScore,
			enterName : enterName
		};
		
		Storage.prototype.setObject = function (key,obj){
			var objString = JSON.stringify(obj);
			return this.setItem( key,objString);
		};
		Storage.prototype.getObject = function (key,obj){
			var objString = this.getItem( key);
			return JSON.parse(objString);
		};
	}());	
	return GameInterface;
});