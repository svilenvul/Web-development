window.onload = function () {
	var input = document.querySelector("input");
	var list = document.querySelector("#TODOList");
	var btnAdd = document.querySelector("#btn-add");
	var btnRemove = document.querySelector("#btn-remove");
	var btnShow = document.querySelector("#btn-show");
	var btnHide = document.querySelector("#btn-hide");
	var selectedListItem;

	btnAdd.addEventListener("click", function addItem() {
		var value = input.value;
		if (!value) {
			return;
		}
		var listItem = document.createElement("LI");
		listItem.innerHTML = value;
		listItem.className = "unselected";
		list.appendChild(listItem);
	}, false);

	btnRemove.addEventListener("click", function () {
		var selectedItems = document.querySelectorAll(".selected");
		if (selectedItems) {
			for (var i = 0; i < selectedItems.length; i++) {
				selectedItems[i].parentNode.removeChild(selectedItems[i]);
			}
		}
	}, false);

	btnHide.addEventListener("click", function () {
		var selectedItems = document.querySelectorAll(".selected");
		if (selectedItems) {
			for (var i = 0; i < selectedItems.length; i++) {
				selectedItems[i].style.display = "none";
				selectedItems[i].className = "hidden";
			}
		}
	}, false);

	btnShow.addEventListener("click", function () {
		var hiddenItems = document.querySelectorAll(".hidden");
		if (hiddenItems) {
			for (var i = 0; i < hiddenItems.length; i++) {
				hiddenItems[i].style.display = "block";
				hiddenItems[i].className = "unselected";
				hiddenItems[i].style.border = "none";
			}
		}
	}, false);

	list.addEventListener("click", function selectListItem(event) {
		var target = event.target;
		if (target.parentNode === list) {
			if (target.className === "unselected") {
				target.className = "selected";
				target.style.border = "1px solid black";
			} else {
				target.className = "unselected";
				target.style.border = "none";
			}
		}
	}, false);

}
