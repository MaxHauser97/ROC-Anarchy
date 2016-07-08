<?php
	function Connect ($databasename) {
		if ($conn = mysqli_connect(databasehost, databaseuser, databasepass)) {
			if (mysqli_select_db($conn, $databasename)) {
				//Database exists
			}
			else {
				if (mysqli_query($conn, "CREATE DATABASE " . $databasename . "")) {
					//Database succesfully created!
				}
				else {
					//All hope is lost.
				}
			}
			return $conn;
		}
		else {
			return false; //The connection could not be established.
		}
	}
?>