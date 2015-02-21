<html>
<head>
</head>
<body>
<?php 
function removeNames ($input,$remove) {
	$first = explode(" ",$input);
	$second = explode(" ",$remove);
	$result = array_diff($first,$second);
	return implode(" ", $result);
}

$input ="Hristo Hristo Nakov Nakov Petya  ";
$remove = "Nakov Vanessa Maria";

echo removeNames($input,$remove);
?>
</body>
</html>