<html>
<head>
</head>
<body>
<?php 
class Sequence {
	private static function findLongestIn($array,$difference) {		
		$lenght = 1;
		$bestLenght = 0;
		$start = 0;
		$bestStart = 0;
		$nextValue = 0;

		for ($i = 0; $i < count($array) - 1; $i++) {
			$nextValue = $array[$i + 1] - $difference;
			if ($array[$i] === $nextValue) {
				if ($lenght == 1) {
					$start = $i;
				}
				$lenght++;
			} else {
				if ($lenght > $bestLenght) {
					$bestLenght = $lenght;
					$bestStart = $start;
				}
				$lenght = 1;
			}
		}
		if ($lenght > $bestLenght) {
			$bestLenght = $lenght;
			$bestStart = $start;
		}
		$sequence = array();

		for ($i = $bestStart, $l = 0; $i < $bestStart + $bestLenght; $i++, $l++) {
			$sequence[$l] = $array[$i];
		}

		return $sequence;
	}
	public static function findLongestIncreasingIn($input) {
		$array = explode(" ",$input);
		$integerValues = array_map('intval',$array);
		return self::findLongestIn($integerValues,1);
	}
	public static function findLargestEqualIn($input) {
		$array = explode(" ",$input);
		
		return self::findLongestIn($array, 0);
	}
}
$input = "hello";	
$input2 = "10 9 8 7 6 5 4 3 2 1";

$longestEqualSequence = Sequence::findLargestEqualIn($input);
$longestIncreasingSequence = Sequence::findLongestIncreasingIn($input2);

print_r($longestEqualSequence);
print_r($longestIncreasingSequence);
?>
</body>
</html>