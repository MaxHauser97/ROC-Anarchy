<?php
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location: Login.php?login=false");
	}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Beveiliging</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php if (usesSSL) {echo "https";} else {echo "http";} ?>://st27.nl/School/siteIcon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
	.jumbotron{background-color:#EF6C00; color: #fff; margin-bottom: 0px;}
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
	  <h1>Beveiliging</h1>
	  <p>Een volledig overzicht over beveiliging</p>
	</div>

<div class="container-fluid"  data-spy="affix" data-offset-top="197" style="background-color: #e8e8e8; z-index: 9999;">
	<div class="container-fluid">
		<div class="container">
			<p><a href="index.php">Dashboard</a> <span class="glyphicon glyphicon-menu-right"></span> <a href="Beveiliging-edu.php">Beveiliging</a></p>
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
			  <a href="#" class="list-group-item">Beveiliging</a>
			  <a href="#" class="list-group-item">Encryptie</a>
			  <a href="#" class="list-group-item">SSL (https)</a>
			</div>
			</p>
			</div>
			<div class="col-md-6 text-center">
			<span class="glyphicon glyphicon-lock" style="color: #808080; font-size: 100px; margin-top: 140px;"></span>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h2>Beveiliging</h2></div>
		</div>
		
		<div class="row">
			<p>
				Beveiliging is een belangrijk onderdeel van je website, om de privacy van je gebruikers te beschermen en de integriteit van je website leggen wij hieronder uit hoe je je site beter kan beveiligen.
				<hr>
			</p>
		</div>
		<div class="row">
			<div class="col-md-12"><h2>Encryptie</h2></div>
		</div>
		
		<div class="row">
			<p>
				Encryptie zorgt ervoor dat data onherkenbaar wordt gemaakt.
				<hr>
				Dit is zodat niemand die in de databases komt of de data onderschept direct de wachtwoorden kan lezen.<br>
				Hieronder vindt je een kleine PHP functie die verstuurde data encrypt om in de database te stoppen:<br>
				<pre>
					$username = $_POST["username"]; //Haalt de gegevens op uit de POST data
					$password = $_POST["wactwoord"];
					
					$encryptedUsername = MD5($username); //Encrypt de gegevens met MD5 encryptie
					$encryptedPassword = MD5($password);
				</pre>
				Dit is ongeveer wat er gebeurd:
				<pre>
					$username = "Gerard";
					$password = "IkHebEenSlechtWachtwoord";
					
					$encryptedUsername = "e3bbe025630ba3adb63d65f8a2457b93";
					$encryptedPassword = "49902161976693224598bb5a79f85932";
				</pre>
				Zoals je hierboven kan zien, is de data compleet onherkenbaar gemaakt en kan je dus niet aflezen wat het originele wachtwoord is.<br>
				Houd wel in gedachten dat MD5 niet de enige vorm van encryptie is, voor meer soorten en geavanceerdere encryptie, klik <a href="http://php.net/manual/en/function.hash.php#104987">hier.</a><br><br>
				Tegenwoordig is het gokken van een wachtwoord of het <a href="TheMoreYouKnow.php?subject=bruteforce">bruteforcen</a> van een wachtwoord niet heel lastig voor de meeste hackers.<br>
				Op heel veel sites moet je dan ook een wachtwoord hebben met minimaal 1 hoofdletter, zoveel karakters lang, etc.<br>
				Dit is tegenwoordig ook niet heel veilig meer. Wij raden je daarom aan om <a href="TheMoreYouKnow.php?subject=wachtwoordzin">wachtwoordzinnen</a> als standaard te forceren.
			</p>
		</div>
		<div class="row">
			<div class="col-md-12"><h2>SSL (https)</h2></div>
		</div>
		
		<div class="row">
			<p>
				Een SSL certificaat zorgt ervoor dat data geencrypt wordt wanneer een gebruiker een form submit.
				<hr>
				Dit is zodat niemand die de data onderschept direct de wachtwoorden kan lezen.<br>
				Een SSL certificaat kan je tegenwoordig gratis aanvragen op: <a href="https://www.letsencrypt.com">LetsEncrypt</a><br>
				Deze moet je vervolgens installeren/instellen op je server. Raadpleeg je server host voor meer informatie.<br><br>
				PROTIP: Je wilt vanaf begin 2017 zeker maken dat je een SSL certificaat op je server hebt, aangezien chrome <a href="https://lh6.googleusercontent.com/L1VU0pNtX3SttI8E4FkpQtjm0wC0x_rlFWGSoTa3X2T_aVBETBx2QZr6udH3Zs7mEZR4ZFfTpLU1eDBonccHZTVTQAWUK21_LNbjDjg36HUkNSLN4bwhSrQYiccmIKb4VkE5WKS2">dit</a> gaat doen aan het begin van 2017.
			</p>
		</div>
	</div>
</div>

</body>
</html>
