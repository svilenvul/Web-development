<html>
<head>
</head>
<body>
<?php 
function binarySearch ($array,$value) {
	sort($array);
	$left = 0;
	$right = count($array)-1;
	$middle;
	
	while ($left <= $right) {
		$middle = floor(($right + $left)/2);
		if($array[$middle] === $value) {
			return $middle;
		} else if ($array[$middle] > $value) {
			$right = $middle - 1;
		} else {
			$left = $middle + 1;
		}
	}
	return -1;
}
$list = [14, -32, 67, 76, 23, -41, 58, 85];
$list2 = [1, 2, 3, 4, 5, 6, 7, 8];
$list3 = [1, 1, 1, 1, 1, 1, 1, 1];

echo(binarySearch($list,8)."<br/>");
echo(binarySearch($list2,8)."<br/>");
echo(binarySearch($list3,8)."<br/>");
?>
</body>
</html>