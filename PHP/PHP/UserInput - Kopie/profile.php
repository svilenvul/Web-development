<html>
<head>
</head>
<body>
<div id = "content"></div>
<?php
	require_once "User.php";
	define("PATH","users.txt");

		
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$username = $_GET["search"];
		$user = User::searchUser($username,PATH);
		if ($user) {
			generateBody($user);
		} else{
			echo file_get_contents("login.php");
			echo "<p>No user with name {$username}</p>";
		}		
	} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST["username"];
		$pass = $_POST["pass"];
		$user = User::searchUser($username,PATH);
		if ($user) {
			if($user->pass === $pass) {
				generateBody($user);
				$userdata = serialize($user);
				echo <<<EOT
					<form action="register.php" method="post">
					   <input type="hidden"  name = "userdata" value="{$userdata}" />
					   <button type="submit"/>
					</form>`"
EOT;
			} else {
				echo file_get_contents("login.php");
				echo "<p>Incorrect password</p>";
			}
		} else{
			echo file_get_contents("login.php");
			echo "<p>No user with name {$username}</p>";
		}
	}
	
?>
</body>
</html>