<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<p>
<?php 
$a = 5;
$b = 3;
function calculateArea ($a,$b) {
	return $a*$b;
}
echo calculateArea($a,$b);
?>
</p>
</body>
</html>