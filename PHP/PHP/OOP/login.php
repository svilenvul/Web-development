<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1251">
<title>Insert title here</title>
</head>
<?php 
	require_once "classes/functions.php";
	require_once ("header.php");
?>
<body>
<?php 
	if(isset($_POST["username"]) && $_POST["pass"]) {
		require_once "classes/User.php";
		
		$username = $_POST["username"];
		$pass = $_POST["pass"];
		$registeredUser = User::getUser($username);
		$storedPass = $registeredUser["Password"];
		$storedUsername = $registeredUser["UserName"];
				
		if ($registeredUser) {
			if($storedUsername === $username &&
					crypt($pass,$storedPass) == $storedPass) {
				session_start();
				$_SESSION["user"] = $username;		
			} else{
				echo "<p>Username or  pass dont match!!!</p>";
			}
		} else {
			echo "<p>Username dont exist!!!</p>";			
		}
	}
	if(isLogged()) {
		header("Location: http://localhost:8080/PHP/OOP/profile.php?username={$_SESSION["user"]}");		
	} else {
		echo <<<EOT
		<section id = "login">
				<form method ="post" >
				<label for="input_username">User Name</label>
				<input type="text" name="username" id="input_username"/>
				
				<label for="input_pass">Password</label>
				<input type="password" name="pass" id="input_pass"/>
				<button type="submit" >Login</button>
			</form>
		</section>
EOT;
	}
?>
</body>
 <?php 
	require_once ("footer.php");
?>
</html>