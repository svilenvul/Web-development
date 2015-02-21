<?php
	function get_resulttab($users) {
		<section id ="resulttab">
			<h2>Results:</h2>
			foreach($users as $user) {
				<p><strong>Username<strong><span>{$user->name}</span></p>
			}		
		</section>
	}
?>