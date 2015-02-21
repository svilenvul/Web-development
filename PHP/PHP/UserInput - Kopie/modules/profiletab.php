<?php
	function generateProfile ($user,$logged) { 
		echo <<<EOT
		<section id="profiletab">
			<p><strong>Name:</strong><span>\t{$user->name}</span></p>
			if($logged) {
				<p><strong>Secret question:</strong><span>\t{$user->secretquestion}</span></p>
				<p><strong>Secret answer:</strong><span>\t{$user->secretanswer}</span></p>
			}
			<p><strong>Email:</strong><span>\t{$user->email}</span></p>
			<p><strong>First name:</strong><span>\t{$user->fname}</span></p>
			<p><strong>Last name:</strong><span>\t{$user->lname}</span></p>
			<p><strong>Email:</strong><span>\t{$user->email}</span></p>
			<p><strong>Sex:</strong><span>\t{$user->sex}</span></p>
			<p><strong>Birthday:</strong><span>\t{$user->birthday}</span></p>
		</section>
EOT;
	}
?>