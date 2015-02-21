<html>
<head>
</head>
<body>
<?php 
	function sortAscending($numbers) {
		$temp;
		$minValue;
		$minIndex;
		for ($i = 0; $i < count($numbers); $i++) {
			$minValue = $numbers[$i];
			$minIndex = $i;
			for ($j = $i + 1; $j < count($numbers); $j++) {
				if ($numbers[$j] < $minValue) {
					$minValue = $numbers[$j];
					$minIndex = $j;
				}
			}
			if ($minValue !== $numbers[$i]) {
				$temp = $numbers[$i];
				$numbers[$i] = $numbers[$minIndex];
				$numbers[$minIndex] = $temp;
			}
		}
		return $numbers;
	}


$list = [ 14, -32, 67, 76, 23, -41, 58, 85 ];
$list2 = [ 1, 2, 3, 4, 5, 6, 7, 8 ];
$list3 = [ 1, 1, 1, 1, 1, 1, 1, 1 ];

print_r(implode(" ",sortAscending($list))."<br/>");
print_r(implode(" ",sortAscending($list2))."<br/>");
print_r(implode(" ",sortAscending($list3))."<br/>");
?>
</body>
</html>