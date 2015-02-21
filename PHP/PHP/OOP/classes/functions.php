<?php
function isLogged() {
	session_start();
	if(isset($_SESSION["user"]) && $_SESSION["user"] !== "") {
		return true;
	} else{
		return false;
	}
}
$isLogged = "isLogged";
?>