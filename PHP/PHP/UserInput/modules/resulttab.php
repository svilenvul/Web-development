<?php
	function get_resulttab($users) {
		echo "<section id =\"resulttab\"><h2>Results:</h2>";
			for($i = 0;$i < count($users);$i++) {
				echo "<p><a href='profile.php?username=".$users[$i]["Name"]."'><strong>Username<strong><span>{$users[$i]["Name"]}</span></a></p>";
			}		
		echo "</section>";
	}
?>