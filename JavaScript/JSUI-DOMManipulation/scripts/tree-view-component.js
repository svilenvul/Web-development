addOnclickEvent();

function addOnclickEvent() {
	collapse = true;
	var listedItems = document.getElementsByTagName("LI");
	for (var i = 0; i < listedItems.length; i++) {
		var li = listedItems[i];
		listedItems[i].onclick = function onclick(li) {
			collapseChildren(li);
		};
	}
}

function collapseChildren(li) {
	var li = li.currentTarget;
	var firstSibling = li.nextElementSibling;
	if (firstSibling instanceof HTMLUListElement) {
		if (firstSibling.style.display === "inline-block") {
			firstSibling.style.display = "none";
			collapse = false;
		} else {
			firstSibling.style.display = "inline-block";
			collapse = false;
		}
	}
}