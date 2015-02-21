<html>
<head>
</head>
<body>
<?php 
require_once "User.php";
define("PATH","users.txt");

$username = $_POST["username"];
$pass = $_POST["pass"];
$question = $_POST["secretquestion"];
$answer = $_POST["secretanswer"];
$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$sex = $_POST["sex"];
$birthday = $_POST["birthday"];


if(User::searchUser($username,PATH)) {	
	echo "<p>User already existing.Try with different username.</p>";
} else {
	$newUser = new User ($user,$pass,$question,
		$answer,$email,$fname,$lname,$sex,$birthday);
	if(User::addUser($newUser,PATH)) {
		echo "<p>User created !!!</p>";
	} else {
		echo "<p>Error writing to file</p>";
	}		
}		
?>
</body>
</html>