<?php
	function Connect () {
		if ($conn = mysqli_connect(databasehost, databaseuser, databasepass)) {
			if (mysqli_select_db($conn, databasename)) {
				//Database exists
			}
			else {
				if (mysqli_query($conn, "CREATE DATABASE " . databasename)) {
					//Database succesfully created!
				}
				else {
					//All hope is lost.
					return false;
				}
			}
			return $conn;
		}
		else {
			return false; //The connection could not be established.
		}
	}
	
	function Query ($tablename, $query) {
		if ($conn = Connect()) {
			if ($result = mysqli_query($conn, $query)) {
				if (mysqli_num_rows($result) != null) {
					return $result;
				}
				else {
					return false; //No data
				}
			}
			else {
				include 'CreateDatabases.php';
				if (JustDoIt()) {
					//Table created!						
					if ($result = mysqli_query($conn, $query)) {
						if (mysqli_num_rows($result) != null) {
							return $result;
						}
						else {
							return false; //No data
						}
					}
					else {
						return false;
					}
				}
				else {
					//All hope is lost.
					return false;
				}
			}
		}
		else {
			//There is no connection to a database!
			return false;
		}
	}
?>