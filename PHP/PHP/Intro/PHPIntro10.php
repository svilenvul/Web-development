<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<p>
<?php 
function isThirdDigit7 ($number) {
	$temp = $number/100;
	if ($temp % 10 === 7){
		return true;
	} else {
		return false;
	}
}
echo isThirdDigit7(4577) ? 'true' : 'false';
echo isThirdDigit7(58712) ? 'true' : 'false';
?>
</p>
</body>
</html>