<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<p>
<?php 
function canBeDiviededBy7and5 ($number) {
	if ($number % 5 === 0  && $number % 7 === 0){
		return true;
	} else {
		return false;
	}
}
echo canBeDiviededBy7and5(7) ? 'true' : 'false';
echo canBeDiviededBy7and5(8) ? 'true' : 'false';
?>
</p>
</body>
</html>