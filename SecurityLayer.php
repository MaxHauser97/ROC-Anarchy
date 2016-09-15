<?php
	if (usesSSL) {
		if ($_SERVER['HTTPS'] != "on" && $_SERVER['SERVER_NAME'] != "localhost") { //Localhost doesn't require authentication, this would cause issues with local setups
			$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			header("Location: $url");
			exit;
		}
	}
?>