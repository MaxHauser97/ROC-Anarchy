<?php
	include 'Config.php';
	
	if (environment == "dev") {
	
		if ($conn = mysqli_connect(databasehost, databaseuser, databasepass)) {
			echo "PREPARE, FOR SOME BLACK MAGIC!";
			echo CreateDatabase('rocanarchy');
			echo CreateTable('users (id int AUTO_INCREMENT PRIMARY KEY, name varchar(255), password varchar(255))');
			echo InsertData("INSERT INTO users (name, password) VALUES ('leerling', 'b9d71fbbd8ca839533a47180a57da24f0187f2ec55dd282fb90150686336980922a502949f36bffcd54d832ff373a377acbfe9a7480493a9a83f1122d6846d2b')");
			echo InsertData("INSERT INTO users (name, password) VALUES ('admin', '6d83fb6436ca42f5283d85c8c186c2d780aae6b6325dd17adbaaab28d77edf54068197ca5cc652a85ff2b104f597f3de13340eaf97edc6253a7f250142b8f14f')");
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
	
	function InsertData ($query) {
		if (mysqli_query($query)) {
			return "Succesfully inserted query: $query";
		}
		else {
			return "Failed inserting query: $query";
		}
	}
	
	function JustDoIt () {
		if ($conn = mysqli_connect(databasehost, databaseuser, databasepass)) {
			CreateDatabase('rocanarchy');
			CreateTable('users (id int AUTO_INCREMENT PRIMARY KEY, name varchar(255), password varchar(255))');
			InsertData("INSERT INTO users (name, password) VALUES ('leerling', 'b9d71fbbd8ca839533a47180a57da24f0187f2ec55dd282fb90150686336980922a502949f36bffcd54d832ff373a377acbfe9a7480493a9a83f1122d6846d2b')");
			InsertData("INSERT INTO users (name, password) VALUES ('admin', '6d83fb6436ca42f5283d85c8c186c2d780aae6b6325dd17adbaaab28d77edf54068197ca5cc652a85ff2b104f597f3de13340eaf97edc6253a7f250142b8f14f')");
			return true;
		}
		else {
			return false;
		}
	}
?>