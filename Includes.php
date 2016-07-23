<?php
	//All of the files needed to be included.
	include 'Config.php';
	include 'Database.php';
	
	if (maintenance == 1) {
		header("Location: Maintenance.php");
	}
?>