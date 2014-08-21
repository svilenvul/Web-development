function createDivs() {
	var number = document.getElementById("number").value;

	var oldDivs = document.getElementsByTagName("div");
	while (oldDivs.length > 0) {
		document.body.removeChild(oldDivs[0]);
	}

	for (var i = 0; i < number; i++) {
		var newDiv = document.createElement("div");
		var strong = document.createElement("strong");
		strong.innerHTML = "div";
		newDiv.appendChild(strong);

		setBorder(newDiv)
		setPosition(newDiv);
		setDimensions(newDiv);
		setColours(newDiv);
		document.body.appendChild(newDiv);
	}

	function setDimensions(element) {
		element.style.width = generateRandomNumber(20, 100) + "px";
		element.style.height = generateRandomNumber(20, 100) + "px";
	}

	function setColours(element) {
		element.style.backgroundColor = generateRandomColor();
		element.style.color = generateRandomColor();
	}

	function setPosition(element) {
		element.style.position = "absolute";
		element.style.top = generateRandomNumber
				(0, window.innerHeight) + "px";
		element.style.left = generateRandomNumber
				(20, window.innerWidth) + "px";
	}

	function setBorder(element) {
		element.style.border = "solid";
		element.style.borderWidth = generateRandomNumber(1, 20) + "px";
		element.style.borderColor = generateRandomColor();
		element.style.borderRadius = generateRandomNumber(0, 20) + "px";
	}

	function generateRandomColor() {
		var randomColor = "rgb(" + generateRandomNumber(0, 256) + 
				", " + generateRandomNumber(0, 256) + 
				", " + generateRandomNumber(0, 256) + ")";
		return randomColor;
	}

	function generateRandomNumber(min, max) {
		var randomNumber = Math.floor(Math.random() * (max - min) + min);
		return randomNumber;
	}

}