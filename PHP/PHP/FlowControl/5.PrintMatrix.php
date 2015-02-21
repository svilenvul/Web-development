<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<?php
function printMatrix ($number) {
	if(is_numeric($number) && $number >=2) {
		for ($i = 0; $i < $number; $i++) {
			for ($l = 1 + $i; $l < $number + $i + 1; $l++) {
				echo $l + ' ';
			}
			echo "<br/>";
		}
	} else {
		throw new Exception("Invlid arguments");
	}	
}
printMatrix(3);
printMatrix(4);
printMatrix(0);
?>
</body>
</html>