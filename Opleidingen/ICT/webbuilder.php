<?php
	session_start();
	
	$rootDir = '../..';

	if (!isset($_SESSION["username"])) {
		header("Location: $rootDir/Login.php?login=false");
	}
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mainDB";

	if(isset($_POST["inloggen"])){
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT id, firstname, lastname FROM users";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<table><tr><th>ID</th><th>Name</th></tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. " " . $row["lastname"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}

		$conn->close();
	}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php if (usesSSL) {echo "https";} else {echo "http";} ?>://st27.nl/School/siteIcon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
	<form method="post" action="webbuilder.php">
		<input type="text" placeholder="Gebruikersnaam" name="User-gebruikersnaam">
		<br>
		<input type="password" placeholder="Wachtwoord" name="User-password">
		<br>
		<input type="submit" value="verstuur" name="inloggen">
	</form>
</div>

</body>
</html>

