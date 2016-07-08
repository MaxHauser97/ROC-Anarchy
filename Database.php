<?php
	function Connect ($databasename) {
		if ($conn = mysqli_connect(databasehost, databaseuser, databasepass, $databasename)) {
			return $conn;
		}
		else {
			return false; //The connection could not be established.
		}
	}
?>