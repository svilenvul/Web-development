<html>
<head>
</head>
<body>
<?php 
function combineLetters ($first,$second) {
	$firstArray = explode(" ",$first);
	$secondArray = explode(" ",$second);
	$result = $firstArray;
	foreach($secondArray as $value) {
		if(!in_array($value,$firstArray)) {
			$result[] = $value;
		}
	}	
	return implode(" ", $result);
}

$first ="a b a";
$second = "b b a a";

echo combineLetters($first,$second);
?>
</body>
</html>