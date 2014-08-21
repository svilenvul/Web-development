var timer;

function moveDivsInCircle() {
	if (timer) {
		return;
	}
	var section = document.getElementsByTagName("section")[0];

	var xCenter = window.innerWidth / 2;
	var yCenter = window.innerHeight / 2;
	var radius = 80;
	var changeAngle = 5;
	var timeInterval = 200;
	var elements;

	if (section) {
		elements = section.childNodes;
	} else {
		elements = createDivs();
	}

	timer = window.setInterval(function rotate() {
		moveElementsOnce(elements, changeAngle);
		changeAngle += 10;
	}, timeInterval);

	function createDivs() {
		var section = document.createElement("section");
		var elements = [];

		for (var i = 0; i < 5; i++) {
			var newDiv = document.createElement("div");
			newDiv.style.position = "absolute";
			newDiv.innerHTML = "Div" + i;
			elements[i] = newDiv;
			section.appendChild(newDiv);
		}
		document.body.appendChild(section);

		return elements;
	}

	function moveElementOnce(element, angle) {
		var x = xCenter + Math.cos(toRadians(angle)) * radius;

		var y = yCenter + Math.sin(toRadians(angle)) * radius;

		function toRadians(angle) {
			return angle * (Math.PI / 180);
		}


		element.style.left = x + "px";
		element.style.top = y + "px";

		return element;
	}

	function moveElementsOnce(elements, changeAngle) {
		for (var i = 0; i < elements.length; i++) {
			var angle = (72 * i + changeAngle) % 360;
			elements[i] = moveElementOnce(elements[i], angle);
		}
	}

}

function stopMovement () { 
  timer = clearInterval(timer);  
}