<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<p>
<?php 
function printAllLessThan ($number) {
	for($i = 0; $i <= $number; $i++){
		echo $i." ";
	}
}
printAllLessThan(5);
?>
</p>
</body>
</html>