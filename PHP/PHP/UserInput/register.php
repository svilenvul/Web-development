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
	require_once("User.php");
	require_once("modules/registertab.php");
	get_registertab ();
		?>
	</section>
</body>
</html>