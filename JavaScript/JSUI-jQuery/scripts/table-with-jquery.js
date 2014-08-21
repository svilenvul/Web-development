var students = [{
		firstName : "Goscho",
		secondName : "Toschev",
		age : 35
	}, {
		firstName : "Pescho",
		secondName : "Geschev",
		age : 26
	}, {
		firstName : "Tischo",
		secondName : "Toschev",
		age : 40
	}, {
		firstName : "Mischo",
		secondName : "Toschev",
		age : 35
	}, {
		firstName : "Traicho",
		secondName : "Gerogiev",
		age : 23
	},
];

var $table = $("<table />").appendTo($("body"));

var $header = $("<thead />").appendTo($table);
var $headerRow = $("<tr />").appendTo($header);

$headerRow.append($("<td />").html("First Name"));
$headerRow.append($("<td />").html("Second Name"));
$headerRow.append($("<td />").html("Age"));
$table.append();

for (var i = 0; i < students.length; i++) {
	var $row = $("<tr />");
	var $fisrtCol = $("<td />").html(students[i].firstName);
	var $secondCol = $("<td />").html(students[i].secondName);
	var $thirdCol = $("<td />").html(students[i].age);
	$row.append($fisrtCol).append($secondCol).append($thirdCol);
	$table.append($row);
}