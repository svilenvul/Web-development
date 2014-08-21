var colorPicker = $("#color-picker");
colorPicker.on("change", function () {
	$("body").css("background-color", colorPicker.val());
});