var liBefore = document.createElement("li");
liBefore.innerHTML = "Inserted using insert before";
var liAfter = document.createElement("li");
liAfter.innerHTML = "Inserted using insert after";

var referenceElement = document.getElementById("forth");

function insertAfter(newElement, referenceElement) {
	$(newElement).insertAfter($(referenceElement));
}

function insertBefore(newElement, referenceElement) {
	$(newElement).insertBefore($(referenceElement));
}

insertBefore(liBefore, forth);
insertAfter(liAfter, forth);