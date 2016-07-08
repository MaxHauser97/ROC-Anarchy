<?php
	include 'Includes.php';

	if ($_POST) {
		$username = $_POST["username"];
		$password = $_POST["pwd"];
	}
	
	if ($_POST && $conn = Connect("rocanarchy")) {
		//We have connection!
		if ($username == "leerling" && $password == "LCTA004A") {
			echo "<div>You are logged in as leerling!</div>";
		}
		else {
			echo "<div>Wrong credentials!</div>";
		}
	}
	elseif($_POST) {
		echo "<div class='error'>Er is op dit moment een probleem met de verbinding met de databases. Probeer het over 5 minuten nog eens. Als dit probleem zich blijft voordoen, neem dan contact op met een server beheerder.</div>";
	}
?>

 <!DOCTYPE html>
<html lang="nl">
<head>
  <title>ROC Anarchy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Login.css">
</head>
<body>

<div class="container-fluid">
	<div class="container loginwrapper">
		<h1><span class="glyphicon glyphicon-fire"></span>Welkom op ROC Anarchy!</h1>
		<p>Toch maar wat leren dan? <br>Log in om toegang te krijgen tot de informatie die je nodig hebt om w&#233;l te slagen.</p>

		<form class="form-horizontal" action="Login.php" method="POST" role="form">
			<div class="form-group">
			  <label class="control-label col-sm-3" for="user">Gebruikersnaam:</label>
			  <div class="col-sm-5">
				<input type="text" class="form-control" id="username" name="username" placeholder="Gebruikersnaam" autofocus>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-3" for="pwd">Wachtwoord:</label>
			  <div class="col-sm-5">
				<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Wachtwoord">
			  </div>
			</div>

		  <div class="form-group">
			<div class="col-sm-offset-3 col-sm-10">
			  <button type="submit" class="btn btn-default button">Inloggen</button>
			</div>
		  </div>
		</form>
	</div>
</div>

<div class="container-fluid footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p class="text-center">
				Een initiatief van leerlingen :)
				</p>
			</div>
		</div>
	</div>
</div>

</body>
</html>