$.fn.dropdown = function () {
	var $select = $('#dropdown').css("display", "none");
	var $container = $("<div />").addClass("dropdown-list-container");
	var $list = $("<ul />").addClass("dropdown-list-options");
	$list.appendTo($container);
	
	var $children = $select.children();
	
	$list.on("click", "li", function (ev) {
		var index = $(ev.target).attr("data-value");
		console.log(index);
		var $option = $('option[value="' + index + '"]');
		$children.attr("selected", false)
		$option.attr("selected", true);
	});
	
	for (var i = 0; i < $children.length; i++) {
		var $child = $($children[i]);
		var $listItem = $("<li/>").addClass("dropdown-list-option").attr("data-value", $child.val()).html($child.html());
		$listItem.appendTo($list);
	}
	
	$container.appendTo(document.body);
	return this;
}
$('#dropdown').dropdown();