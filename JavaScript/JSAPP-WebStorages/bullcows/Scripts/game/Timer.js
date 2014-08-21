define("Timer",function () {
	var Timer;
	(Timer = function() {
		function Timer () {
			this.startTime = new Date ();
			this.container = document.createElement("span");
			this.intervalID = 0;
			this.timeInSeconds = 0;
		}
		
		Timer.prototype = {
			start : function () {
				var that = this;
				this.container.innerHTML ="00 : 00";				
				
				this.intervalID = setInterval (function () {
					var currentTime = new Date();
					var seconds = Math.floor((currentTime.getTime() - that.startTime.getTime()) / 1000);					
					that.timeInSeconds  = seconds;
					that.formatTime(seconds);
				},1000);
				
				
			},
			stop : function () {
				clearInterval(this.intervalID);
			},
			formatTime : function (seconds) {
				hours = parseInt(seconds / 3600);			 
				minutes = parseInt(seconds / 60);
				seconds = parseInt(seconds % 60);
				
				var secondsString = seconds.toString();
				var minutesString = minutes.toString();
				if (seconds < 10) {
					secondsString = "0" + secondsString;
				}
				if (minutes < 10) {
					minutesString = "0" + minutesString;
				}
				this.container.innerHTML = minutesString + " : " + secondsString ;  
			},
			floorTime : function () {
				var time = this.timeInSeconds;				
				
				if (time < 30) {
					time = 30;
				}else if (time < 45 && time > 30 ) {
					time = 45;
				}else if (time < 60 && time >45){
					time = 60;
				}else if (time < 90 && time > 60) {
					time = 90;
				}else if (time < 120 && time > 90){
					time = 120;
				}else {
					time = 121;
				}
				
				return time;
			},
			reset : function () {
				this.startTime = new Date ();				
				this.intervalID = 0;
				this.timeInSeconds = 0;
				this.start();
			}
		};
		
		return Timer;
	}());
	return Timer;
});