define("Game",["jQuery","numberUtils","ratingsValues","GameInterface"],function($,numberUtils,ratingsValues,GameInterface) {
	var Game;
	Game = (function () {			
		function Game (GameInterface) {
			this.MAXIMUM_GUESSES = 7;
			this.numberLength = 4;
			this.number = numberUtils.generateRandomNumber(4);
			this.playerNumber = [];			
			this.trys = [];
			this.state = "unfinished";
			this.timeFinished = 0;
			this.score = 0;
			this.playerName = "unknown"; 
			this.gameInterface = GameInterface;
			this.attachFunctions();
		}
		
		Game.prototype = {			
			attachFunctions : function () {				
				var that = this;
				
				$("#" + this.gameInterface.playerInputID).on("keyup",function () {
					var numberArray  = this.value.split("");
					var correctedNumberArray = numberUtils.correctUserInput(numberArray);					
					this.value = correctedNumberArray.toString();
				}),
				
				
				$("#" + this.gameInterface.checkBtnID).on("click",function () {					
					var numberString = $("#playerInput").val();					
					if(numberString.length ===4) {
						var playerNumber = numberString.split("");
						that.playerNumber = playerNumber;
						that.compareNumbers();
					}				
				});				
						
				
			},
			detachFunctions : function () {
				var that = this;
				$("#" + this.gameInterface.playerInputID).off();
				$("#" + this.gameInterface.checkBtnID).off();
			},
			
			compareNumbers : function () {				
				var matches = numberUtils.comapreNumberArrays(this.playerNumber,this.number);
				this.currentResult = {
					cows : matches["numberMatches"],
					bulls : matches["positionMatches"],
					number : this.playerNumber
				};
				this.trys.push(this.currentResult);
				this.gameInterface.addToHistory(this.trys.length,this.currentResult);
				this.checkIfGameIsOver();
			},			
			checkIfGameIsOver : function () {
				if (this.trys.length === this.MAXIMUM_GUESSES) {
					this.state = "lost";
					this.endGame();
				} else if (this.currentResult.bulls === 4) {
					this.state = "won";
					this.endGame();
				}
			},			
			endGame : function() {				
				this.gameInterface.timer.stop();
				this.timeFinished = this.gameInterface.timer.floorTime();
				this.calcualteResult();
				this.gameInterface.revealNumber(this.number.toString());
				this.gameInterface.enterName(this.score);
				this.detachFunctions();
				var that = this;
				$("#" + this.gameInterface.checkBtnID).on("click",function () {
					that.playerName = $("#" + that.gameInterface.playerInputID).val();
					that.updateHighScore();	
					that.restart();
				});					
					
				
			},
			calcualteResult : function () {			
				this.score = ratingsValues.state[this.state]*ratingsValues.time[this.timeFinished]*ratingsValues.numberOfTrys[this.trys.length];
				console.log ("score " + this.score);
			},			
			updateHighScore: function () {
				var highScore;
				
				if (localStorage.getObject("HighScore") === null) {
					highScore = [];				
				} else {
					highScore = localStorage.getObject("HighScore");
				}
				highScore.push({
					name:this.playerName,
					score:this.score
					});
				highScore.sort(function (a,b){
					return b.score - a.score;
				});
				
				localStorage.setObject("HighScore",highScore);
				this.gameInterface.loadHighScore(highScore);
			},
			restart : function () {
				$("#" + this.gameInterface.checkBtnID).off();
				this.number = numberUtils.generateRandomNumber(4);
				this.playerNumber = [];			
				this.trys = [];
				this.state = "unfinished";
				this.timeFinished = 0;
				this.score = 0;
				this.playerName = "unknown";
				this.attachFunctions();
				this.gameInterface.clear();
				this.gameInterface.timer.reset();
			}
		};	
		
		Array.prototype.toString = function () {
			var result = "";
			for (var i = 0; i < this.length; i++) {
				result = result + this [i];
			}
			return result;
		};
		Storage.prototype.setObject = function (key,obj){
			var objString = JSON.stringify(obj);
			return this.setItem( key,objString);
		};
		Storage.prototype.getObject = function (key,obj){
			var objString = this.getItem( key);
			return JSON.parse(objString);
		};
		
		return Game;
	}());
	return Game;
});