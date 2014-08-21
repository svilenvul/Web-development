var textArea = document.getElementsByTagName("textarea")[0];

function changeBackground(HTMLelement) {
	var backgroundColor = document.getElementById("backgroundColor").value;
	HTMLelement.style.backgroundColor = backgroundColor;
}

function changeFontColor(HTMLelement) {
	var color = document.getElementById("fontColor").value;
	HTMLelement.style.color = color;
}