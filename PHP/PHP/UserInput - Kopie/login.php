<html>
<head>
	<style>
		body {
			display:block;
			width : 500px;
		}
		div {
			border : 1px solid black;
		}
		label,input,button {			
			display : inline-block;
			height : 20px;
			width : 30%;
		}
		button {
			width :30%;
			display : inline-block;			
			position : relative;
			margin : 0 auto;
			margin-top : 5px;
		}	
	</style>
</head>
<body>
	<div>		
		<form method="get" action = "profile.php">
			<label for="input_search">User Name</label>
			<input type="text" name = "search" id="input_search"/>
			<button type="submit">Search</button>
		</form>
	</div>
	<div>
		<form method ="post" action="profile.php">
			<label for="input_username">User Name</label>
			<input type="text" name="username" id="input_username"/>
			<button type="submit" >Login</button>	
			<label for="input_pass">Password</label>
			<input type="text" name="pass" id="input_pass"/>								
		</form>
	</div>
	<div>
		<span>Not user ?</span>
		<a href="register.php">Register</a>
		<span><?php 
			if (isset($_GET["message"])) {
				echo $_GET["message"];
			} 
		?></span>
	</div>
</body>
</html>