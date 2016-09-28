<?php
	session_start();
	$rootDir = '../..';
	include $rootDir.'/Framework/Includes.php';

	if (!isset($_SESSION["username"])) {
		header("Location: $rootDir/Login.php?login=false");
	}
	
	$adminform = "";
	$haschosen = false;
	
	if (isset($_GET["action"])) {
		if ($_SESSION["username"] == "admin" || $_SESSION["username"] == "superadmin") {
			if ($_GET["action"] == "EditUpdateNotes") {
				$haschosen = true;
				$adminform = "<form action='Userpage.php' method='POST' name='EditUpdateNotesForm' id='UpdateNotesForm'>
								<input type='text' name='NewUpdateTitle' placeholder='Typ hier een nieuwe update notificatie titel.'>
								<textarea name='NewUpdateText' form='UpdateNotesForm' placeholder='Typ hier de nieuwe update notificatie' rows='8' cols='160'></textarea><br>
								<input type='submit' name='AddUpdateNote' value='Voeg nieuwe update notificatie toe.'>
							</form>";
			}
			if ($_GET["action"] == "ExecuteShellCommands") {
				$haschosen = true;
				$adminform = "<form action='Userpage.php?action=ExecuteShellCommands' method='POST' name='ExecuteShellCommandsForm' id='ExecuteShellForm'>
								<input type='text' name='Command' placeholder='Typ hier een command om uit te voeren.'>
								<textarea name='OutputText' form='ExecuteShellCommandsForm' placeholder='Hier komt output' rows='8' cols='160'>PLACEHOLDEROUTPUT</textarea><br>
								<input type='submit' name='ExecuteShellCommand' value='Voer shell command uit.'>
							</form>";
			}
		}
	}
	
	if ($_SESSION["username"] == "admin" || $_SESSION["username"] == "superadmin") {
		if (isset($_POST["AddUpdateNote"])) {
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
		if (isset($_POST["ExecuteShellCommand"])) {
			$output = shell_exec($_POST["Command"] . " 2>&1");
			$explode = explode("PLACEHOLDEROUTPUT", $adminform);
			$adminform = $explode[0] . $output . $explode[1];
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
			<div class="container-fluid" id="LoadNavbar">
				
			</div>
			<script> 
				$(function(){
					$("#LoadNavbar").load("navbars/NavbarUserPage.html");
					var interval = setInterval(function(){if ($("#userHref").length) {$("#userHref").append("<?php echo $_SESSION["username"];?>"); clearInterval(interval);}},1);
				});
			</script>
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
						if ($_SESSION["username"] == "admin" || $_SESSION["username"] == "superadmin") {
							echo "<button onclick=\"window.location.href='Userpage.php?action=EditUpdateNotes'\">Wijzig update notificaties.</button>";
						}
						if ($_SESSION["username"] == "superadmin") {
							echo "<button onclick=\"window.location.href='Userpage.php?action=ExecuteShellCommands'\">Voer shell commands uit.</button>";
						}
					}
					else {
						if ($_SESSION["username"] == "admin" || $_SESSION["username"] == "superadmin") {
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
