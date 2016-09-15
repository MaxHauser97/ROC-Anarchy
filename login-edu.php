<?php
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location: Login.php?login=false");
	}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Loginsysteem</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href=<?php if (usesSSL) {echo "https";} else {echo "http";} ?>"://st27.nl/School/siteIcon.png">
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
			<p><a href="index.php">Dashboard</a> <span class="glyphicon glyphicon-menu-right"></span> <a href="login-edu.php">Loginsysteem</a></p>
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
			  <a href="#" class="list-group-item">Verbinden met database</a>
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
			Als eerst moet er weer een connectie gemaakt worden met de database zodat de gegevens gechecked kunnen worden.<br>
			Kopieer de code hieronder om de connectie te maken.<br>
			<pre>
$servernaam = "localhost";
$db_gebruikersnaam = "root";
$db_wachtwoord = "root";

// Create connection
$conn = mysqli_connect($servernaam, $db_gebruikersnaam, $db_wachtwoord);

// Check connection
if (!$conn) {
die("Connectie onsuccesvol: " . mysqli_connect_error());
}
echo "Er is connectie!";		
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
			<div class="col-md-12"><p>Vervolgens gaan we het formulier aanmaken.<br>Hieronder is een standaard voorbeeld die je altijd nog kan aanpassen.</p></div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
<pre>
< form role="form">
< div class="form-group">
< label for="email">Email adres:</label>
< input type="email" class="form-control" id="email">
< /div>
< div class="form-group">
< label for="pwd">Wachtwoord:</label>
< input type="password" class="form-control" id="pwd">
< /div>
< button type="submit" class="btn btn-default">Verstuur</button>
< /form>	
</pre>			
			</div>
		
			<div class="col-md-6">
				<form role="form">
				  <div class="form-group">
					<label for="email">Email adres:</label>
					<input type="email" class="form-control" id="email">
				  </div>
				  <div class="form-group">
					<label for="pwd">Wachtwoord:</label>
					<input type="password" class="form-control" id="pwd">
				  </div>
				  <button type="submit" class="btn btn-default">Verstuur</button>
				</form>			
			</div>
		</div>
		<hr>	
	</div>
</div>

</body>
</html>	
			
