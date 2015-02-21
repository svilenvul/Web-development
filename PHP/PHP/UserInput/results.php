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
			
			if(isset($_SESSION["user"]) &&  $_SESSION["user"] !==""){
				require_once "modules/logged.php";
				get_logged($_SESSION["user"]);
			} else {
				require_once "modules/unlogged.php";
				get_unlogged();
			}
		?>
	</header>
	<?php
	require_once "User.php";
	require_once "modules/resulttab.php";
	
	
	$username = $_GET["search"];
	
	$users = User::searchUsers($username);
	get_resulttab($users);
	?>
</body>
</html>