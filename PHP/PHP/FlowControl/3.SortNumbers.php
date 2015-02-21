<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<?php 
function sortNumbers($array) {
	if($array[0] > $array[1]){
		$array = swap($array,1,0);
	}
	if($array[0] > $array[2]) {
		$array = swap($array,2,0);
	}
	if($array[1] > $array[2]) {
		$array = swap($array,2,1);
	}
	return $array;
}

function swap($array,$source,$dest){
	$temp = $array[$source];
	$array[$source] = $array [$dest];
	$array[$dest] = $temp;
	return $array;
}

echo implode(sortNumbers([0,5,7]),', ');
?>
</body>
</html>