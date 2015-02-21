<?php
	function get_logintab() {
		echo <<<EOT
		<section id = "logintab">
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