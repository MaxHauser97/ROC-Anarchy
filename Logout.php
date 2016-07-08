<?php
	session_start();
	session_destroy();
	header("Location: Login.php");
?>

U bent nu uitgelogd, u wordt omgeleid naar de login pagina.