<header>
	<img></img> 
	<strong>CarRepair</strong>
	<span>Place find professional help for your car</span>
	<?php
		if(isset($_SESSION["user"])) {
			echo "<a href='editprofile.php?user={$_SESSION["user"]}'>Edit</a>";
			echo "Hello, <a href='profile.php?user={$_SESSION["user"]}'>{$_SESSION["user"]}</a> !";
		} else {
			echo "<a href='register.php'>Register</a>";
			echo "<a href='login.php'>Log in</a>";			
		}
	?>
</header>
