<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<?php 
function showSign ($first,$second,$third) {
	if(is_numeric($first) && is_numeric($second) && is_numeric($third)) {
		$result = "-";
		if (intval($first) >= 0 ){
			if (intval($second >= 0)) {
				$result = "+";
			}
			else if (intval($third >= 0)) {
				$result = "+";
			}			
		} else if (intval($second) >= 0 ){
			if (intval($third >= 0)) {
				$result = "+";
			}
		}
		return $result;
	} else {
		throw new Exception('Arguments are not numbers');
	}	
}
echo showSign(34,3,2);
echo showSign(34,-3,2);
echo showSign(-34,-3,2);
echo showSign(-34,0,2);
?>
</body>
</html>