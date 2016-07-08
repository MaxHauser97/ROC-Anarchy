<?php
	$GLOBALS['databasename'] = "";
	
	function Connect ($databasename) {
		if ($conn = mysqli_connect(databasehost, databaseuser, databasepass)) {
			if (mysqli_select_db($conn, $databasename)) {
				//Database exists
				$GLOBALS['databasename'] = $databasename;
			}
			else {
				if (mysqli_query($conn, "CREATE DATABASE " . $databasename)) {
					//Database succesfully created!
					$GLOBALS['databasename'] = $databasename;
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
		if ($GLOBALS['databasename']) {
			if ($conn = Connect($GLOBALS['databasename'])) {
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
		else {
			//There is no connection to a database!
			return false;
		}
	}
?>