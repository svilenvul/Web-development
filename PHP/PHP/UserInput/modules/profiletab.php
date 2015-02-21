<?php
	function generateProfile ($userInfo,$logged) { 
		echo <<<EOT
		<section id="profiletab">
			<p><img src="uploads/{$userInfo['picture']}"width="150px" height="150px"></p>
			<p><strong>Name:</strong><span>\t{$userInfo["Name"]}</span></p>
			<p><strong>First name:</strong><span>\t{$userInfo["Fname"]}</span></p>
			<p><strong>Last name:</strong><span>\t{$userInfo["Lname"]}</span></p>
			<p><strong>Email:</strong><span>\t{$userInfo["Email"]}</span></p>
			<p><strong>Sex:</strong><span>\t{$userInfo["Sex"]}</span></p>
			<p><strong>Birthday:</strong><span>\t{$userInfo["Birthday"]}</span></p>
		</section>
EOT;
	}
?>