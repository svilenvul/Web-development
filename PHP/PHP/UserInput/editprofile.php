<html>
<head>
	 <link rel="stylesheet" type="text/css" href="styles/background.css">	
	<link rel="stylesheet" type="text/css" href="modules/styles/registertab.css">
	<link rel="stylesheet" type="text/css" href="modules/styles/searchtab.css">	
</head>
<body>
	<header>
		<?php
			require_once "modules/searchtab.php";
			get_searchtab();
		?>
	</header>
	<section>
		<?php
	session_start();
	require_once("User.php");
	require_once("modules/edittab.php");
	if($_SESSION["user"]) {
		$userinfo = User::getUser($_SESSION["user"]);
		get_edittab ($userinfo,"edit");
	} else {
		echo "<p>You must login to edit profile</p>";
	}
?>
	</section>
</body>
</html>