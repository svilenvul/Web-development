var courses = [{
		title : "javaScrpt basics",
		startDate : "23.03.2014",
		endDate : "12.04.2014"
	}, {
		title : "javaScrpt ui",
		startDate : "23.03.2014",
		endDate : "12.04.2014"
	}, {
		title : "javaScrpt applications",
		startDate : "23.04.2014",
		endDate : "12.05.2014"
	}, {
		title : "javaScrpt oop",
		startDate : "23.05.2014",
		endDate : "12.06.2014"
	}, {
		title : "javaScrpt advanced",
		startDate : "23.06.2014",
		endDate : "12.07.2014"
	},
];

var templateNode = document.getElementById("template-container");
var templateString = templateNode.innerHTML;
var template = Handlebars.compile(templateString);

var tableHTML = template({
		courses : courses
	});
var content = document.createElement("div");
content.innerHTML = tableHTML;
document.body.appendChild(content);