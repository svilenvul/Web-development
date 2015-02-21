<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<?php
$words = ["php","html","java","php","sql","html"];

function extractWords ($words) {
	$extracted = array_unique($words);		
	printWords($extracted);
}
function printWords($extracted) {
	foreach($extracted as $key => $value) {
		echo($value." ");
	}
}
extractWords($words);
?>
</body>
</html>