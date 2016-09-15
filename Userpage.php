<?php
	session_start();
	include 'Includes.php';

	if (!isset($_SESSION["username"])) {
		header("Location: Login.php?login=false");
	}
	
	$adminform = "";
	$haschosen = false;
	
	if (isset($_GET["action"])) {
		if ($_GET["action"] == "EditUpdateNotes" && $_SESSION["username"] == "admin") {
			$haschosen = true;
			$adminform = "<form action='Userpage.php' method='POST' name='EditUpdateNotesForm' id='UpdateNotesForm'>
							<input type='text' name='NewUpdateTitle' placeholder='Typ hier een nieuwe update notificatie titel.'>
							<textarea name='NewUpdateText' form='UpdateNotesForm' placeholder='Typ hier de nieuwe update notificatie' rows='8' cols='160'></textarea><br>
							<input type='submit' name='AddUpdateNote' value='Voeg nieuwe update notificatie toe.'>
						</form>";
		}
	}
	
	if (isset($_POST["AddUpdateNote"]) && $_SESSION["username"] == "admin") {
		if ($conn = Connect()) {
			if (preg_replace('/[^A-Za-z0-9\-\s+-]/', '', $_POST['NewUpdateTitle']) != $_POST['NewUpdateTitle']) {
				//echo "no1";
				return;
			}
			if (preg_replace('/[^A-Za-z0-9\-\s+-]/', '', $_POST['NewUpdateText']) != $_POST['NewUpdateText']) {
				//echo "no2";
				return;
			}
			$title = $_POST["NewUpdateTitle"];
			$text = $_POST["NewUpdateText"];
			
			if ($result = Query("updates", "INSERT INTO updates (title, text) VALUES ('$title','$text')")) {
				//Success
			}
			else {
				echo "<div class='error'>Er is op dit moment een probleem met de verbinding met de databases. Probeer het over 5 minuten nog eens. Als dit probleem zich blijft voordoen, neem dan contact op met een server beheerder.</div>";
			}
		}
		else {
			echo "<div class='error'>Er is op dit moment een probleem met de verbinding met de databases. Probeer het over 5 minuten nog eens. Als dit probleem zich blijft voordoen, neem dan contact op met een server beheerder.</div>";
		}
	}
?>

<!DOCTYPE html>
<html lang="nl">
	<head>
	<title>ROCAnarchy - Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php if (usesSSL) {echo "https";} else {echo "http";} ?>://st27.nl/School/siteIcon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body{background-color: #f5f5f5;}
			.roc{color: #EF5350;}
			a{color: #333;}
			a:hover{text-decoration: none;}
			.glyphicon.glyphicon-fire{color: #808080;}
			h3{border-top-left-radius: 5px; border-top-right-radius: 5px; margin-bottom: 0px;}
			.meer-info{background-color: #fff; border: 1px solid; padding: 75px 0px 5px 15px; text-align: left; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; font-weight: bold;}
			.col-sm-3:nth-child(1) p.meer-info{border-color: #3F51B5;}
			.col-sm-3:nth-child(2) p.meer-info{border-color: #009688;}
			.col-sm-3:nth-child(3) p.meer-info{border-color: #FFC107;}
			.col-sm-3:nth-child(4) p.meer-info{border-color: #E53935;}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#" class="roc"><span class="glyphicon glyphicon-fire"></span><span class="roc"> ROCAnarchy</span></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="database-edu.php">Databases</a></li>
				<li><a href="login-edu.php">Loginsysteem</a></li>
				<li><a href="registratie-edu.php">Registratiesysteem</a></li>
				<li><a href="crud-edu.php">CRUD</a></li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span>  <?php echo $_SESSION["username"]; ?></a></li>
				<li><a href="Logout.php"><span class="glyphicon glyphicon-log-in"></span> Uitloggen</a></li>
			  </ul>
			</div>
		  </div>
		</nav>

		<div class="container-fluid">
			<div class="container">
			  <div class="jumbotron text-center">
				<h1>Userpage</h1>
			  </div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="container">
				<?php
					if ($haschosen == false) {
						if ($_SESSION["username"] == "admin") {
							echo "<button onclick=\"window.location.href='Userpage.php?action=EditUpdateNotes'\">Wijzig update notificaties.</button>";
						}
					}
					else {
						if ($_SESSION["username"] == "admin") {
							echo $adminform;
						}
					}
				?>
			</div>
		</div>

		<script>
			
		</script>

	</body>
</html>
