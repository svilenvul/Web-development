<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<p>
<?php 
function getFibonacciMembers ($number) {
	$first = 0;
	$second = 1;
	$third = 1;
	
	while ($number > 0) {
		echo($first + " ");
		$first = $second;
		$second = $third;
		$third = $first + $second;
		$number--;
	}
}
getFibonacciMembers(5);
getFibonacciMembers(0);
getFibonacciMembers(1);
?>
</p>
</body>
</html>