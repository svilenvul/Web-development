<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<?php
class Circle{
	const RADIUS = 2; 
	static function isInCircle($x,$y) {
		if (is_numeric($x) && is_numeric($y)) {
			$dist = sqrt(pow($x,2) + pow($y,2));
			if($dist <= self::RADIUS) {
				return true;
			} else {
				return false;
			}
		} else {
			throw new Exception("Invalid arguments");
		}		
	}
}
echo (Circle::isInCircle(1,2) ? 'true': 'false').'<br/>';
echo (Circle::isInCircle(0,0) ? 'true': 'false').'<br/>';
echo (Circle::isInCircle(1.5,1) ? 'true': 'false').'<br/>';
echo (Circle::isInCircle(5,'a') ? 'true':'false').'<br/>';
?>
</body>
</html>