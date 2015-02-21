<html>
<head>
</head>
<body>
<?php 
function printArray () {
	$array = array(20);
	for($i = 0; $i < 20; $i++) {
		$array[$i] = $i*5;
		echo ($array[$i]." ");
	}
}
printArray();
?>
</body>
</html>