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
  <title>CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php if (usesSSL) {echo "https";} else {echo "http";} ?>://st27.nl/School/siteIcon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
	.jumbotron{background-color:#E53935; color: #fff; margin-bottom: 0px;}
	a{color: #808080;}
	.container-fluid:first-child p{margin: 10px;}
	@media screen and (max-width: 768px) {.glyphicon.glyphicon-transfer{margin-top: 20px !important;}}
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
	  <h1>CRUD</h1>
	  <p>Create, Read, Update, Delete</p>
	</div>

<div class="container-fluid"  data-spy="affix" data-offset-top="197" style="background-color: #e8e8e8; z-index: 9999;">
	<div class="container-fluid">
		<div class="container">
			<p><a href="../index.php">Dashboard</a> <span class="glyphicon glyphicon-menu-right"></span> <a href="crud-edu.php">CRUD</a></p>
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
			  <a href="#" class="list-group-item">Create record</a>
			  <a href="#" class="list-group-item">Read record</a>
			  <a href="#" class="list-group-item">Update record</a>
			  <a href="#" class="list-group-item">Delete record</a>
			</div>
			</p>
			</div>
			<div class="col-md-6 text-center">
			<span class="glyphicon glyphicon-transfer" style="color: #808080; font-size: 100px; margin-top: 140px;"></span>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h2>Create record</h2></div>
		</div>
		
		<div class="row">
		<p>
			We beginnen bij create record. Met deze functie maak je de informatie aan. Een voorbeeld hiervan is bij het registreren.<br>
			De SQL syntaxes + uitleg:
			<pre>
CREATE (database, table) (naam) //Maakt een database of tabel aan.
//Bijvoorbeeld:
CREATE DATABASE ROCAnarchy
//^dit maakt een database genaamd ROCAnarchy aan

CREATE TABLE Users (
   id INT(6) AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(50) NOT NULL,
   password VARCHAR(50) NOT NULL,
   email VARCHAR(50)
)
//^dit maakt een tabel aan in een database met 4 kolommen: id, username, password en email.
//De waardes van deze kolommen zijn: INT, VARCHAR, VARCHAR, en VARCHAR.
//Integers (INT) zijn waardes die altijd hele getallen zijn. Alleen getallen als -2, 2, 444, etc. worden geaccepteerd.

//Variable Character (VARCHAR) zijn waardes die je kan vergelijken met STRINGS, het zijn waardes waar letters en cijfers in mogen. Bijvoorbeeld: Gerard123
//Let echter wel op, omdat een VARCHAR wordt gezien als TEKST kan je geen berekeningen doen als je er alleen maar cijfers in zou stoppen. Als je bijvoorbeeld
//in een VARCHAR de waarde: 102 zou hebben, kan je geen 102+1 doen omdat je niet kan rekenen met tekst. In sommige programeertalen gebeurt er dan zelfs dit:
//102+1 = 1021, omdat hij dan denkt dat je meer tekst wilt toevoegen, en dit gaat automatisch naar het einde van de tekst.

//AUTO_INCREMENT betekent dat bij elke nieuwe row die wordt geinsert dat hij er automatisch +1 bij optelt.
//PRIMARY KEY is de sleutel waarop een rij geidentificeerd kan worden door het systeem. Elke waarde van een primary key moet uniek zijn en niet null.
//NOT NULL betekent dat er EEN waarde moet zijn. In programmeren is het zo dat als je NIKS terug krijgt als waarde dat het NULL is.

INSERT INTO tabelnaam (kolom1, kolom2, etc.) VALUES (waardekolom1, waardekolom2, etc.)
//Bijvoorbeeld:
INSERT INTO Users (username, password, email) VALUES ('Jan', 'Geheim', 'Jan@gmail.com')
//Dit voegt een nieuwe row (waardes) toe in een tabel
//ID staat hier niet bij, omdat ID een AUTO_INCREMENT heeft, dus de waarde wordt automatisch gemaakt voor ID.
			</pre>
			De PHP syntaxes:
			<pre>
if ($_POST["submit"]) { //Voer dit alleen maar uit als een form gesubmit is
   $conn = mysqli_connect("server", "user", "pass", "databasenaam"); //Connect met de server

   mysqli_query($conn, "CREATE DATABASE ROCAnarchy"); //Maak een nieuwe database aan op de server

   mysqli_select_db($conn, "ROCAnarchy"); //Selecteer een database

   mysqli_query($conn, "CREATE TABLE Users(
      id INT(6) AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(50) NOT NULL,
      password VARCHAR(50) NOT NULL, 
      email VARCHAR(50)
   )"); //Maakt een nieuwe tabel aan in de  huidig geselecteerde database

   $username = $_POST["username"]; //Haalt username op uit form
   $password = $_POST["password"]; //Haalt password op uit form
   $email = $_POST["email"]; //Haalt email op uit form

   mysqli_query($conn, "INSERT INTO Users (username, password, email) VALUES ('$username', '$password', '$email')"); //Voegt nieuwe row toe
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
			<div class="col-md-12"><h2>Read record</h2></div>
		</div>
		
		<div class="row">
		<p>
			De read record zorgt ervoor dat de gegevens die in de database staan terug worden gestuurd naar de pagina.<br><br>
			Voorbeeld van een table:
			<pre><table border="1" style="float:left;"><th>id</th><th>name</th><th>lastname</th><tr><td>1</td><td>Jan</td><td>Willem</td></tr><tr><td>2</td><td>Gerard</td><td>Yolo</td></tr></table><--Columname<br><--Values</pre>
			<pre>$result = mysqli_query($conn, "SELECT * FROM table"); //Selects all data from the requested table<br><br>while($row = mysqli_fetch_array($result)) {<br> echo $row["columnname"]; <br>}</pre>
			<hr>			
		</p>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h2>Update record</h2></div>
		</div>
		
		<div class="row">
		<p>
			De Update record zorgt ervoor dat de gegevens vernieuwd worden in de database.
			<pre>UPDATE (tabelnaam) SET (nieuwe input) WHERE (verouderede input) ;</pre>
			<hr>
		</p>
		</div>
	</div>
</div>

</body>
</html>
