<?php
	session_start();
	if (isset($_SESSION["username"]) && $_SESSION["username"] == "admin") {
		
		//include 'Config.php';
		
		if (environment == "dev") {
		
			if ($conn = mysqli_connect(databasehost, databaseuser, databasepass)) {
				echo "PREPARE, FOR SOME BLACK MAGIC!<br>";
				echo CreateDatabase('rocanarchy');
				echo CreateTable('users (id int AUTO_INCREMENT PRIMARY KEY, name varchar(255), password varchar(255))');
				if (GetData("SELECT * FROM users WHERE name='leerling'") == false) {
					echo InsertData("INSERT INTO users (name, password) VALUES ('leerling', 'b9d71fbbd8ca839533a47180a57da24f0187f2ec55dd282fb90150686336980922a502949f36bffcd54d832ff373a377acbfe9a7480493a9a83f1122d6846d2b')");
				}
				if (GetData("SELECT * FROM users WHERE name='admin'") == false) {
					echo InsertData("INSERT INTO users (name, password) VALUES ('admin', '6d83fb6436ca42f5283d85c8c186c2d780aae6b6325dd17adbaaab28d77edf54068197ca5cc652a85ff2b104f597f3de13340eaf97edc6253a7f250142b8f14f')");
				}
				echo CreateTable('updates (id int AUTO_INCREMENT PRIMARY KEY, title text(255), text text(255))');
				if (GetData("SELECT * FROM updates WHERE title='Test'") == false) {
					echo InsertData("INSERT INTO updates (title, text) VALUES ('Test', 'Hier komen updates over de site te staan.')");
				}
			}
			else {
				echo "Wrong SQL login credentials. Edit your credentials in Config.php!";
			}
		
		}
		
	}
	
	function CreateDatabase ($name) {
		$conn = mysqli_connect(databasehost, databaseuser, databasepass);
		if (mysqli_query($conn, "CREATE DATABASE $name")) {
			return "Succesfully created DATABASE $name <br>";
		}
		else {
			return "Failed creating DATABASE $name <br>";
		}
	}
	
	function CreateTable ($name) {
		$conn = mysqli_connect(databasehost, databaseuser, databasepass, databasename);
		if (mysqli_query($conn, "CREATE TABLE $name")) {
			return "Succesfully created TABLE $name <br>";
		}
		else {
			return "Failed creating TABLE $name <br>";
		}
	}
	
	function InsertData ($query) {
		$conn = mysqli_connect(databasehost, databaseuser, databasepass, databasename);
		if (mysqli_query($conn, $query)) {
			return "Succesfully inserted query: $query <br>";
		}
		else {
			return "Failed inserting query: $query <br>";
		}
	}
	
	function GetData ($query) {
		$conn = mysqli_connect(databasehost, databaseuser, databasepass, databasename);
		if (mysqli_query($conn, $query)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function JustDoIt () {
		if ($conn = mysqli_connect(databasehost, databaseuser, databasepass)) {
			CreateDatabase('rocanarchy');
			CreateTable('users (id int AUTO_INCREMENT PRIMARY KEY, name varchar(255), password varchar(255))');
			InsertData("INSERT INTO users (name, password) VALUES ('leerling', 'b9d71fbbd8ca839533a47180a57da24f0187f2ec55dd282fb90150686336980922a502949f36bffcd54d832ff373a377acbfe9a7480493a9a83f1122d6846d2b')");
			InsertData("INSERT INTO users (name, password) VALUES ('admin', '6d83fb6436ca42f5283d85c8c186c2d780aae6b6325dd17adbaaab28d77edf54068197ca5cc652a85ff2b104f597f3de13340eaf97edc6253a7f250142b8f14f')");
			CreateTable('updates (id int AUTO_INCREMENT PRIMARY KEY, title varchar(255), text varchar(255))');
			InsertData("INSERT INTO updates (title, text) VALUES ('Test', 'Hier komen in de toekomst updates over de site te staan.')");
			return true;
		}
		else {
			return false;
		}
	}
?>