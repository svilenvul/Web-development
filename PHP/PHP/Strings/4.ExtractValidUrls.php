<html>
<head>
</head>
<body>
<?php 
$url = "http://www.example.com";
$regex = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/";

preg_match_all($regex,$url,$matches);
print_r($matches);

?>
</body>
</html>