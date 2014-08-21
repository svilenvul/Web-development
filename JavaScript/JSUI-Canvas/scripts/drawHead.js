drawHead();

function drawHead() {
	var canvas = document.getElementById('head');
	var context = canvas.getContext('2d');

	function drawElipse(centerX, centerY, radius, deformationX, deformationY) {
		context.beginPath();		
		context.save();
		context.scale(deformationX, deformationY);
		context.arc(centerX / deformationX, centerY / 
				deformationY, radius, 0, 2 * Math.PI);
		context.closePath();
		context.fill();
		context.stroke();
		context.restore();
	}

	var headRadius = 60;
	var cylinderHeight = 75;
	var cylinderRadius = headRadius / 1.5;
	var eyeshadeRadius = headRadius * 1.2;
	var height = headRadius * 4;
	var width = eyeshadeRadius * 2;

	context.translate((canvas.width - width) / 2, (canvas.height - height) / 2);

	var insertHeadX = headRadius;
	var insertHeadY = height - headRadius;
	
	drawFace(insertHeadX, insertHeadY, headRadius);
	function drawFace(insertHeadX, insertHeadY, headRadius) {
		context.fillStyle = '#b1aecc';
		drawElipse(insertHeadX, insertHeadY, headRadius, 1, 1);
		drawElipse(insertHeadX - 10, insertHeadY * 1.2, headRadius / 2, 1, 0.3);
		drawElipse(insertHeadX / 2, insertHeadY / 1.1, 10, 0.3, 1);
		drawElipse(insertHeadX, insertHeadY / 1.1, 10, 0.3, 1);

		context.fillStyle = '#232323';
		drawElipse(insertHeadX / 2, insertHeadY / 1.1, 10, 0.2, 0.4);
		drawElipse(insertHeadX, insertHeadY / 1.1, 10, 0.2, 0.4);

	}

	var insertHatX = headRadius;
	var insertHatY = height - 2 * headRadius;	
	drawHat(insertHatX, insertHatY, eyeshadeRadius, 
			cylinderRadius, cylinderHeight);
	function drawHat(insertHatX, insertHatY, eyeshadeRadius, 
			cylinderRadius, cylinderHeight) {

		context.fillStyle = '#695ccc';
		drawElipse(insertHatX, insertHatY, eyeshadeRadius, 1, 0.3);

		drawElipse(insertHatX, insertHatY - cylinderRadius / 3, cylinderRadius, 1, 0.3);

		context.fillRect(cylinderRadius / 2, insertHatY - cylinderRadius / 3 -
				 cylinderHeight, cylinderRadius * 2, cylinderHeight);

		drawElipse(insertHatX, insertHatY - cylinderRadius / 3 - 
				cylinderHeight, cylinderRadius, 1, 0.3);
	}

}

  
