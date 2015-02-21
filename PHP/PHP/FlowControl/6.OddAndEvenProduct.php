<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<?php

function calc_products ($array) {
	
	$oddProduct = 1;
	$evenProduct = 1;
	
	for($i = 0,$length = count($array); $i < $length; $i++) {
		if($i % 2 == 0) {
			$oddProduct *= $array[$i];
		} else {
			$evenProduct *= $array[$i];
		}
	}
	return [$oddProduct,$evenProduct];
}

function compare ($string) {
	$array = str_split($string);
	$products = calc_products($array);
	
	if ($products[0]  === $products[1]) {
		echo 'yes'.'<br/>'.'product'.$products[0].'<br/>';
	} else {
		echo 'no'.'<br/>'
			.'odd product'.$products[0].'<br/>'
			.'even product'.$products[1].'<br/>';
	}
}
compare('2 4 4 1 2 5 6');
compare('0 0 0');
compare('');
?>
</body>
</html>