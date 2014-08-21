
(function () {
	var paper = Raphael("svg-container", 400, 300);
	var sky = paper.rect(0, 0, paper.width, paper.height / 3 * 2);
	sky.attr({
		fill : '90-lightblue-blue)',
		opacity : 0.4
	});
	var grass = paper.rect(0, paper.height / 3 * 2, 
			paper.width, paper.height / 3);
	grass.attr({
		fill : '90-lightgreen-green)',
		opacity : 0.4
	});

	var yCoor = [160, 190, 190, 170, 170, 180, 170];
	var yCoordinatesChange = [+1, +1, +1, +1, +1, +1, +1];

	var mountians = paper.path("M 0 " + paper.height / 3 * 2 + " L " + 
		paper.width + " " + paper.height / 3 * 2 + " " + paper.width + " " + 
		yCoor[0] + " Q 340 " + yCoor[1] + " 300 " + yCoor[2] + " T 130 " + yCoor[3] + 
		"  Q 60 " + yCoor[4] + " 20 " + yCoor[5] + " T 0 " + yCoor[6] + " z");

	mountians.attr({
		fill : "90-lightblue-blue)",
		x : 0,
		y : paper.width / 3 * 2
	});

	setInterval(function () {
		moveMountians(yCoor, yCoordinatesChange, 170, 140);
	}, 300);

	function moveMountians(yCoor, yCoordinatesChange, maxY, minY) {
		for (var i = 0; i < yCoor.length; i++) {
			if (yCoor[i] <= minY) {
				yCoordinatesChange[i] = 1;
			} else if (yCoor[i] >= maxY) {
				yCoordinatesChange[i] = -1;
			}
			yCoor[i] += yCoordinatesChange[i];
		}
		var path = "M 0 " + paper.height / 3 * 2 + " L " + paper.width + " " + paper.height / 3 * 2 + " " + paper.width + " " + yCoor[0] + " Q 340 " + yCoor[1] + " 300 " + yCoor[2] + " T 130 " + yCoor[3] + "  Q 60 " + yCoor[4] + " 20 " + yCoor[5] + " T 0 " + yCoor[6] + " z";

		mountians.attr("path", path);
	}
}	());

(function () {
	var stage = new Kinetic.Stage({
			container : "canvas-container",
			width : 400,
			height : 300
		});
	var layer = new Kinetic.Layer();

	var marioSprites = new Image();
	marioSprites.src = "images/mario.png";
	var startX = 0;
	var mario = new Kinetic.Image({
			x : 150,
			y : 140,
			image : marioSprites,
			width : 100,
			height : 108
		});
	var cropStart = 0;
	setInterval(moveMario, 1000);

	function moveMario() {
		cropStart += 100;
		cropStart %= 300;
		mario.setCrop({
			x : cropStart,
			y : 0,
			width : 100,
			height : 108
		});
		layer.add(mario);
		stage.add(layer);
	}
}	());