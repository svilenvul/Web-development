<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<?php
function findPrimes($n) {
	$sieve = [];
	for($i = 2; $i < sqrt($n); $i++){
		for($l = 2 ; $i*$l < $n; $l++) {
			$sieve[$i*$l] = 1;
		}
	}
	//test($sieve);
	printPrimes($sieve,$n);
}
function test($sieve) {
	echo print_r($sieve);
}
function printPrimes ($sieve,$n) {
	for($i = 2; $i < $n; $i++) {
		if(!isset($sieve[$i])) {
			echo $i." ";
		}
	}
	echo "<br/>";
}
findPrimes(34);
?>
</body>
</html>