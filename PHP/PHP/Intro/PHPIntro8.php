<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<p>
<?php 
$htmlTag1 = "<h1>Hello World</h1>";
$htmlTag2 = "<p>I love Software University<p>"; 
echo htmlentities($htmlTag1);
echo htmlentities($htmlTag2);
?>
</p>
</body>
</html>