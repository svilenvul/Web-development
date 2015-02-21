<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1251">
<title>Insert title here</title>
</head>
<?php 
	require_once 'header.php';
?>
 <body>    
    <?php
    session_start();
    require_once "User.php";
        
    $pass = crypt($_POST["pass"]);
    $question = $_POST["secretquestion"];
    $answer = $_POST["secretanswer"];
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $sex = $_POST["sex"];
    $birthday = $_POST["birthday"];
    if(!isset($_POST["image"])) {
    	$image="default.png";
    } else {
    	$image = $_POST["image"];
    }
    
    if(isset($_POST["username"])) {
    	$username = $_POST["username"];
    	if(User::getUser($username)) {
    		echo "<p>User already existing.Try with different username.</p>";
    	} else {
    		$newUser = new User ($username,$pass,$question,
    				$answer,$email,$fname,$lname,$sex,$birthday,$image);
    			
    		User::addUser($newUser);
    		echo "User succssesifully created!";
    	}
    } else {
    	if(isset($_SESSION["user"])) {
    		$username = $_SESSION["user"];
    		$newUser = new User ($username,$pass,$question,
    				$answer,$email,$fname,$lname,$sex,$birthday,$image);
    		User::updateUser($newUser);
    		echo "<p>User updated !!!</p>";
    	}else {
    		echo "<p>You must login to edit user</p>";
    	}
    }  
	?>
</body>
<?php 
	require_once 'footer.php';
?>    
</html>