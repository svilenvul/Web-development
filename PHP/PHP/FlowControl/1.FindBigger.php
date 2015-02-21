<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<?php 
function findBigger ($first,$second) {
	if($first >= $second){
		return $first;
	} else {
		return $second;
	}
}
echo findBigger(34,3);
?>
</body>
</html>