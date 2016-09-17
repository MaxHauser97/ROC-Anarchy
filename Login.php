<?php
	include 'Includes.php';
	
	if (isset($_GET["login"]) && !isset($_GET["sessError"])) {
		echo "<div class='error'>Je moet eerst inloggen.</div>";
		if ($_GET["login"] == "true") {
			echo "<div class='error'><br>Nee, dit doet niks. Ga gewoon inloggen.</div>";
		}
	}
	elseif (isset($_GET["sessError"])) {
		echo "<div class='error'>Uw sessie kon niet worden gestart. Probeer het over 5 minuten nog eens. Als dit probleem zich blijft voordoen, neem dan contact op met een server beheerder.</div>";
	}

	if ($_POST) {
		$username = $_POST["username"];
		$password = $_POST["pwd"];
	}
	
	$serverError = false;
	
	if ($_POST && $conn = Connect()) {
		//We have connection!
		if ($result = Query("users", "SELECT * FROM users WHERE name = '$username'")) {
			while ($row = mysqli_fetch_array($result)) {
				if ($row["password"] == hash("whirlpool", $password)) {
					session_start();
					if (session_status() == PHP_SESSION_ACTIVE) {
						$_SESSION["username"] = $username;
						header("Location: index.php");
					}
					else {
						echo "<div class='error'>Uw sessie kon niet worden gestart. Probeer het over 5 minuten nog eens. Als dit probleem zich blijft voordoen, neem dan contact op met een server beheerder.</div>";
					}
				}
				else {
					echo "<div class='wrong'>Verkeerde inloggegevens!</div>";
				}
			}
		}
		else {
			echo "<div class='wrong'>Verkeerde inloggegevens!</div>";
		}
	}
	elseif($_POST) {
		echo "<div class='error'>Server status: <span class='glyphicon glyphicon-remove-circle serverStatus' style='color: red;'></span></div>";
		$serverError = true;
	}
?>

<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>ROC - Anarchy</title>
		<link rel="icon" href="<?php if (usesSSL) {echo "https";} else {echo "http";} ?>://st27.nl/School/siteIcon.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Playball" rel="stylesheet">
		<link rel="stylesheet" href="Login.css">
	</head>
	<body>

	<div id="GaNaarTMiddenVerdomme">
		<div class="jumbotron text-center style='padding: 100px 25px;'">
			<h2><span class="glyphicon glyphicon-fire"></span> ROC Anarchy</h2>
			<form method="POST" action="Login.php" class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="Gebruikersnaam" autofocus>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="pwd" placeholder="Wachtwoord">
				</div>
				<button type="submit" class="btn btn-default">Inloggen</button>
			</form>
		</div>

		<div class="container" style="">
			<div class="row">
				<div class="col-sm-4"><span class="	glyphicon glyphicon-blackboard"></span><p>Leren</p></div>
				<div class="col-sm-4"><span class="	glyphicon glyphicon-comment"></span><p>Delen</p></div>
				<div class="col-sm-4"><span class="	glyphicon glyphicon-education"></span><p>Slagen</p></div>
			</div>
		</div>
	</div>

	<div class="row footer">
	  <div class="col-sm-4">Serverstatus <span class='glyphicon glyphicon-remove-circle serverStatus' style='color: red; font-size: 1em;'></span></div>
	  <div class="col-sm-4">Dan leren wij het zelf wel..</div>
	  <div class="col-sm-4">&copy;Copyright <?php echo date('Y'); ?></div>
	</div>
	
	</body>
	
	<script>
		var interval = <?php if ($serverError == false) { echo "setTimeout("; } else { echo "setInterval("; } ?>function() {
			$.ajax("Ajax.php?getServerStatus", {
				success: function (string) {
					var string = JSON.parse(string);
					if (string == "OK") {
						$(".serverStatus").prop("class", "glyphicon glyphicon-ok-circle serverStatus");
						$(".serverStatus").css("color","green");
						clearInterval(interval);
					}
				}
			});
		}, <?php if ($serverError == false) { echo "1"; } else { echo "60000"; } ?>);
	</script>
</html>