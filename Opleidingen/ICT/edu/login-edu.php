<?php
	session_start();
	$rootDir = '../../..';
	include $rootDir.'/Framework/Includes.php';

	if (!isset($_SESSION["username"])) {
		header("Location: $rootDir/Login.php?login=false");
	}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Loginsysteem</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php if (usesSSL) {echo "https";} else {echo "http";} ?>://st27.nl/School/siteIcon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
	.jumbotron{background-color:#009688; color: #fff; margin-bottom: 0px;}
	a{color: #808080;}
	.container-fluid:first-child p{margin: 10px;}
	@media screen and (max-width: 768px) {.glyphicon.glyphicon-th-list{margin-top: 20px !important;}}	
  .affix {
      top: 0;
      width: 100%;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }		
  </style>
</head>

<body>

	<div class="jumbotron text-center">
	  <h1>Loginsysteem</h1>
	  <p>Leer hier alles over loginsystemen</p>
	</div>

<div class="container-fluid"  data-spy="affix" data-offset-top="197" style="background-color: #e8e8e8; z-index: 9999;">
	<div class="container-fluid">
		<div class="container">
			<p><a href="../index.php">Dashboard</a> <span class="glyphicon glyphicon-menu-right"></span> <a href="login-edu.php">Loginsysteem</a></p>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container-fluid">
		<div class="container">
			<div class="col-md-6">
			<h1 style="color: #333; font-size">Intro</h1>
			<p class="text-info">
				Deze instructiepagina gaat de volgende punten bespreken:<br>
			<div class="list-group">
			  <a href="#" class="list-group-item">Connectie maken</a>
			  <a href="#" class="list-group-item">Formulier aanmaken</a>
			  <a href="#" class="list-group-item">Gegevens ophalen uit database</a>
			  <a href="#" class="list-group-item">Testen</a>
			</div>
			
			<blockquote style="background-color: #FFEB3B; border-left-color: #FFC107;">Vergeet niet om commentaar bij je codes te zetten! *</blockquote>
			</p>
			</div>
			<div class="col-md-6 text-center">
			<span class="glyphicon glyphicon-th-list" style="color: #808080; font-size: 100px; margin-top: 140px;"></span>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h2>Connectie maken</h2></div>
		</div>
		
		<div class="row">
		<p>
			Als eerst moet er een connectie gemaakt worden met de database zodat de gegevens opgehaald kunnen worden.<br>
			<br>
			<pre>
$servernaam = "localhost"; //De locatie waar je database zich bevindt.
$db_gebruikersnaam = "root"; //De gebruikersnaam van je database
$db_wachtwoord = "root"; //Het wachtwoord van je database
$db_naam = ""; //De naam van de database

// Create connection
$conn = mysqli_connect($servernaam, $db_gebruikersnaam, $db_wachtwoord, $db_naam); //Verbindt met de database

// Check connection
if (!$conn) {
    die("Connectie onsuccesvol: " . mysqli_connect_error()); //Stopt de pagina van laden, en laat zien: Connectie onsuccesvol: *Reden*
}
else {
    echo "Er is connectie!";
}
</pre>
			<hr>
		</p>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h2>Formulier aanmaken</h2></div>
		</div>
		
		<div class="row">
			<div class="col-md-12"><p>Vervolgens gaan we het formulier aanmaken.<br>Hieronder is een standaard voorbeeld.</p></div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
<pre>
&lt;form method="POST" action="Login.php" role="form"&gt;
    &lt;div class="form-group"&gt;
        &lt;label for="email"&gt;Email adres:&lt;/label&gt;
        &lt;input type="email" class="form-control" name="email"&gt;
    &lt;/div&gt;
    &lt;div class="form-group"&gt;
        &lt;label for="pwd"&gt;Wachtwoord:&lt;/label&gt;
        &lt;input type="password" class="form-control" name="pwd"&gt;
    &lt;/div&gt;
    &lt;input type="submit" class="btn btn-default" value="Verstuur" name="Submit"&gt;
&lt;/form&gt;
</pre>			
			</div>
		
			<div class="col-md-6">
				<form role="form">
				  <div class="form-group">
					<label for="email">Email adres:</label>
					<input type="email" class="form-control" name="email">
				  </div>
				  <div class="form-group">
					<label for="pwd">Wachtwoord:</label>
					<input type="password" class="form-control" name="pwd">
				  </div>
				  <input type="submit" class="btn btn-default" value="Verstuur" name="Submit">
				</form>			
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12"><h2>Gegevens ophalen uit database</h2></div>
		</div>
		
		<div class="row">
			<div class="col-md-12"><p>Vervolgens gaan we de gegevens ophalen uit de database.<br>PROTIP: zet dit onder de onder de php code waarbij je connectie met de database maakt.</p></div>
		</div>
		
		<div class="row">
			<pre>
if (isset($_POST["Verstuur"])) { //Als de form verstuurd is, ga verder
    $result = mysqli_query("SELECT * FROM tabelmetusers WHERE email = ? AND password = ?", $_POST["email"], $_POST["pwd"]);
}


			</pre>
		</div>
		<hr>
	</div>
</div>

</body>
</html>	
			
