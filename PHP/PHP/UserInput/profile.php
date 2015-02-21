<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/background.css">	
	<link rel="stylesheet" type="text/css" href="modules/styles/searchtab.css">	
</head>
<body>
<header>
		<?php			
			session_start();
			if(isset($_GET["unlog"]) && $_GET["unlog"]){				
				unset($_SESSION['user']);
				session_destroy();		
			}
			require_once "modules/searchtab.php";
			get_searchtab();
			
			if(isset($_SESSION["user"]) &&  $_SESSION["user"] !=="") {
				require_once "modules/logged.php";
				get_logged($_SESSION["user"]);
			} else {
				require_once "modules/unlogged.php";
				get_unlogged();
			}
		?>
</header>
<section>
	<?php
		require_once "User.php";
		require_once "modules/profiletab.php";
			
		if(isset($_REQUEST["username"])) {
			$username = $_REQUEST["username"];
			$userInfo = User::getUser($username);
			if ($userInfo) {
				generateProfile($userInfo,false);
			} else {
				echo "<p>error finding user</p>";
			}
		} 	
	?>
</section>
</body>
</html>