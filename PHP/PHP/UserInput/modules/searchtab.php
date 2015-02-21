<?php
	function get_searchtab () {
	echo <<<EOT
		<div id="searchtab">		
			<form method="get" action = "results.php">
				<label for="input_search">User Name</label>
				<input type="text" name = "search" id="input_search"/>
				<button type="submit">Search</button>
			</form>
		</div>
EOT;
	}
?>