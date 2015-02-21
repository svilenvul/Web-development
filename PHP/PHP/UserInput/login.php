<?php 
	require_once "User.php";
			
	if(isset($_SESSION["user"])) {
		header("Location: http://localhost:8080/PHP/UserInput/profile.php?username={$_COOKIE["logged"]}");
	} else {
		$doc = new DOMDocument();
		$span = $doc->getElementById("message");
		if(isset($_POST["username"]) && isset($_POST["pass"])) {
			$username = $_POST["username"];
			$pass = $_POST["pass"];
			$registeredUser = User::getUser($username);
			$storedPass = $registeredUser["Pass"];
			$storedName = $registeredUser["Name"];
			if ($registeredUser) {
				if($storedName === $username && 
					crypt($pass,$storedPass) == $storedPass) {
					session_start();
					$_SESSION["user"] = $username;
					header("Location: http://localhost:8080/PHP/UserInput/profile.php?username={$username}");
					//echo "Succssessfully logged!";
				} else{
					echo "Username or  pass dont match!!!";
					//show login form
				}
			} else {
				echo "Username dont exist!!!";
				//show login form
			}			
		} else {
			//show login form
		}		
	}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/background.css">	
	<link rel="stylesheet" type="text/css" href="modules/styles/registertab.css">
	<link rel="stylesheet" type="text/css" href="modules/styles/searchtab.css">		
</head>
<body>
	<header>
	<?php
		require_once "modules/searchtab.php";
		get_searchtab();
	?>
	</header>
	<?php 
		require_once "modules/logintab.php";
		get_logintab();
	?>	
	<div>
		<span>Not user ?</span>
		<a href="register.php">Register</a>
		<span id="message"></span>
	</div>	
</body>
</html>