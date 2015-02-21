<?php
	function get_logged($username) {
		echo <<<EOT
	<div id ="logged">
		<p><strong>User</strong><span>{$username}</span></p>
		<a href="http://localhost:8080/PHP/UserInput/editprofile.php?username={$username}">Edit</a>
		<image></image>
		<a href=" http://localhost:8080/PHP/UserInput/profile.php?unlog=true">Log out</a>
	</div>
EOT;
	}

?>