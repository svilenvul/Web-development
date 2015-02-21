<html>
<head>
</head>
<body>
<?php 
function findMatches ($text,$substring) {
	$count = 0;
	$text = strtolower($text);
	$substring = strtolower($substring);
	$index = strpos($text, $substring);
	while ($index) {
		$count ++;
		$index = strpos($text, $substring, $index + 1);
	}
	return $count;
}

$text ="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
$substring = "em";
print_r(findMatches ($text,$substring));

?>
</body>
</html>