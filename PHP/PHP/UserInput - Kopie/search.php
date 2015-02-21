<html>
<head>
</head>
<body>
<div id = "content"></div>
<?php
	require_once "utilities.php";
	require_once "User.php";
	$username = $_GET["search"];
	
	$user = searchUser($username);
	if ($user) {		
		echo $user;		
	} else {
		echo "<p>No user </p>";
	}
?>
</body>
</html>