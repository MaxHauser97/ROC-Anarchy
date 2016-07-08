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
				return $result;
			}
			else {
				include 'CreateDatabases.php';
				if (JustDoIt()) {
					//Table created!						
					if ($result = mysqli_query($conn, $query)) {
						return $result;
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