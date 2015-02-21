<html>
<head>
<title>My first PHP Page</title>
</head>
<body>
<p>
<?php 
$singleQuoted = 'I asked a girl out and she said - "I don\'t know". Does she mean yes or no?';
echo "<p>".$singleQuoted."</p>";
$doubleQuoted =  "I asked a girl out and she said - \"I don't know\". Does she mean yes or no?";
echo "<p>".$doubleQuoted."</p>";
?>
</p>
</body>
</html>