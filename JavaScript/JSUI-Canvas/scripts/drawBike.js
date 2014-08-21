drawBike();
function drawBike() {
	var canvas = document.getElementById('bike');
	var context = canvas.getContext('2d');
	context.scale(0.3, 0.3);

	var backAxisX = 170;
	var backAxisY = 450;
	var frontAxisX = 670;
	var frontAxisY = backAxisY;
	var radius = 130;
	var pedalsX = 370;
	var pedalsY = backAxisY;
	var frameBackX = 270;
	var frameBackY = 280;
	var frameFrontX = 600;
	var frameFrontY = frameBackY;
	var seatHeight = 60;

	context.beginPath();

	drawWheels(backAxisX, backAxisY, frontAxisX, frontAxisY, radius);
	function drawWheels(backAxisX, backAxisY, frontAxisX, frontAxisY, radius) {
		context.arc(backAxisX, backAxisY, radius, 0, 2 * Math.PI);
		context.moveTo(frontAxisX, frontAxisY);
		context.arc(frontAxisX, frontAxisY, radius, 0, 2 * Math.PI);
		context.fillStyle = '#5d75dd';
		context.fill();
	}

	drawFrame(frontAxisX, frontAxisY, backAxisX, backAxisY, pedalsX, pedalsY, 
			frameFrontX, frameFrontY, frameBackX, frameBackY);
	
	function drawFrame(frontAxisX, frontAxisY, backAxisX, backAxisY, pedalsX, pedalsY, 
			frameFrontX, frameFrontY, frameBackX, frameBackY) {
		context.moveTo(frontAxisX, frontAxisY);
		context.lineTo(frameFrontX, frameFrontY);
		context.lineTo(frameBackX, frameBackY);
		context.lineTo(backAxisX, backAxisY);
		context.lineTo(pedalsX, pedalsY);
		context.lineTo(frameFrontX, frameFrontY);
	}

	drawBackAxis(pedalsX, pedalsY, frameBackX, frameBackY, seatHeight);
	
	function drawBackAxis(pedalsX, pedalsY, frameBackX, frameBackY, seatHeight) {
		context.moveTo(pedalsX, pedalsY);
		context.lineTo(frameBackX, frameBackY);
		context.lineTo(frameBackX - seatHeight, frameBackY - seatHeight * 1.5);
		context.moveTo(frameBackX - seatHeight - 50, frameBackY - seatHeight * 1.5);
		context.lineTo(frameBackX - seatHeight + 50, frameBackY - seatHeight * 1.5);
	}

	drawFrontAxis(frameFrontX, frameFrontY);

	function drawFrontAxis(frameFrontX, frameFrontY) {
		context.moveTo(frameFrontX, frameFrontY);
		context.lineTo(frameFrontX - seatHeight * 0.3, frameFrontY - seatHeight);
		context.lineTo(640, 170);
		context.moveTo(frameFrontX - seatHeight * 0.3, frameFrontY - seatHeight);
		context.lineTo(490, 240);
	}

	context.stroke();
}

  
  
  
