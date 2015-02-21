<html>
<head>
</head>
<body>
<?php 
function countLetters ($input) {
	$count;
	$array = explode(" ", $input);
	foreach($array  as $key => $letter) {
		if(isset($count[$letter])) {
			$count[$letter] += 1;
		} else{
			$count[$letter] = 1;
		}
	}	
	return $count;
}

$input ="b b a a b";
print_r(countLetters ($input));

?>
</body>
</html>