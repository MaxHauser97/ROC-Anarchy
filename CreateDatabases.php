<?php
	include 'Config.php';
	
	if (isset($_GET["justdoit"])) {
	
		if ($conn = mysqli_connect(databasehost, databaseuser, databasepass)) {
			echo "PREPARE, FOR SOME BLACK MAGIC!";
			echo CreateDatabase('rocanarchy');
			echo CreateTable('users (id int AUTO_INCREMENT PRIMARY KEY, name varchar(255), password varchar(255))');
		}
		else {
			echo "Wrong SQL login credentials. Edit your credentials in Config.php!";
		}
	
	}
	
	function CreateDatabase ($name) {
		if (mysqli_query("CREATE DATABASE $name")) {
			return "Succesfully created DATABASE $name";
		}
		else {
			return "Failed creating DATABASE $name";
		}
	}
	
	function CreateTable ($name) {
		if (mysqli_query("CREATE TABLE $name")) {
			return "Succesfully created TABLE $name";
		}
		else {
			return "Failed creating TABLE $name";
		}
	}
	
	function JustDoIt () {
		if ($conn = mysqli_connect(databasehost, databaseuser, databasepass)) {
			CreateDatabase('rocanarchy');
			CreateTable('users (id int AUTO_INCREMENT PRIMARY KEY, name varchar(255), password varchar(255))');
			return true;
		}
		else {
			return false;
		}
	}
?>