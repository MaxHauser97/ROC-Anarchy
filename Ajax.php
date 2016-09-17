<?php
	include "Includes.php";
	
	if (isset($_REQUEST["getServerStatus"])) {
		if ($conn = Connect()) {
			echo json_encode("OK");
		}
		else {
			echo json_encode("DEAD");
		}
		return;
	}
?>