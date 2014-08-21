drawHouse();
function drawHouse() {
	var canvas = document.getElementById('house');
	var context = canvas.getContext('2d');
	context.fillStyle = '#8a1226';
	context.strokeStyle = '8a1226';

	var width = 600 / 3;
	var storeyHeight = 450 / 3;
	var roofHeight = 220 / 3;
	var windowHeight = 120 / 3;
	var windowWidth = 170 / 3;
	var margin = 50 / 3;
	var height = roofHeight + storeyHeight;

	context.translate((canvas.width - width) / 2, 
			(canvas.height - height) / 2);

	drawStorey(0, roofHeight, width, storeyHeight);

	function drawStorey(startX, startY, width, storeyHeight) {
		context.fillRect(startX, startY, width, storeyHeight);
	}

	drawRoof(roofHeight, width);

	function drawRoof(roofHeigth, width) {
		context.beginPath();
		context.moveTo(width / 2, 0);
		context.lineTo(0, roofHeight - 1);
		context.lineTo(0 + width, roofHeight - 1);
		context.closePath();
		context.fill();
	}

	drawWindows(width, storeyHeight, windowWidth, windowHeight, roofHeight);

	function drawWindows(width, storeyHeight, windowWidth, windowHeight, roofHeight) {
		context.beginPath();
		var widthBetweenWindows = (width / 2 - windowWidth) / 2;
		var heigthBetweenWindows = (storeyHeight - 2 * windowHeight) / 3;

		var topLeftXOfWindow = widthBetweenWindows;
		var topLeftYOfWindow = roofHeight + heigthBetweenWindows;
		drawWidndow(topLeftXOfWindow, topLeftYOfWindow, windowWidth, windowHeight);

		topLeftXOfWindow = widthBetweenWindows + width / 2;
		topLeftYOfWindow = roofHeight + heigthBetweenWindows;
		drawWidndow(topLeftXOfWindow, topLeftYOfWindow, windowWidth, windowHeight);

		topLeftXOfWindow = widthBetweenWindows + width / 2;
		topLeftYOfWindow = heigthBetweenWindows * 2 + windowHeight + roofHeight;
		drawWidndow(topLeftXOfWindow, topLeftYOfWindow, windowWidth, windowHeight);

		context.closePath();
	}

	function drawWidndow(topLeftX, topLeftY, width, height) {
		context.clearRect(topLeftX, topLeftY, width, height);

		context.moveTo(topLeftX + width / 2, topLeftY);
		context.lineTo(topLeftX + width / 2, topLeftY + height);
		context.moveTo(topLeftX, topLeftY + height / 2);
		context.lineTo(topLeftX + width, topLeftY + height / 2);
	}

	drawDoor(width / 8, height, width / 8, height / 6);

	function drawDoor(bottomLeftX, bottomLeftY, width, heigth) {
		context.strokeStyle = '#adadad';
		context.moveTo(bottomLeftX, bottomLeftY);
		context.lineTo(bottomLeftX, bottomLeftY - heigth);
		var arcRadius = width / 2;
		context.arc(bottomLeftX + arcRadius, bottomLeftY - heigth, arcRadius, Math.PI, 0);
		context.lineTo(bottomLeftX + width, bottomLeftY);
		context.moveTo(bottomLeftX + width / 2, bottomLeftY);
		context.lineTo(bottomLeftX + width / 2, bottomLeftY - heigth - arcRadius);
	}

	drawChimney(width * 0.75, roofHeight / 2, 10, roofHeight / 2);
	
	function drawChimney(bottomLeftX, bottomLeftY, width, heigth) {
		context.moveTo(bottomLeftX, bottomLeftY);
		context.lineTo(bottomLeftX, bottomLeftY - heigth);
		var arcRadius = width / 2;
		context.arc(bottomLeftX + arcRadius, bottomLeftY - heigth, arcRadius, Math.PI, 3 * Math.PI);
	}

	context.stroke();
}
  