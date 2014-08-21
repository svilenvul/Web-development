var paper = Raphael("svg-container", 400, 400);
var x0 = paper.circle(200, 200, 1);

var start = 0.03;
var update = 0.05;

for (var i = 1; i < 6000; i++) {
	if (i % 100 === 0) {
		start /= 1.5;
	}
	update += start;
	var angle = Math.PI * update;
	var x = angle * Math.cos(angle) * 3;
	var y = angle * Math.sin(angle) * 3;
	var circle = paper.circle(200 + x, 200 + y, 1)
	circle.attr("fill", "black");
}
