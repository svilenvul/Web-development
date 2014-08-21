var items = [{
		value : 1,
		text : 'One'
	}, {
		value : 2,
		text : 'Two'
	}, {
		value : 3,
		text : 'Three'
	}, {
		value : 4,
		text : 'Four'
	}
];
var templateNode = document.getElementById("select-template");
var templateString = templateNode.innerHTML;
var template = Handlebars.compile(templateString);

var tableHTML = template({
		items : items
	});

var content = document.createElement("div");
content.innerHTML = tableHTML;
document.body.appendChild(content);