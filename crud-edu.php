<?php
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location: Login.php?login=false");
	}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <title>CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href=<?php if (usesSSL) {echo "https";} else {echo "http";} ?>"://st27.nl/School/siteIcon.png">
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
			<p><a href="index.php">Dashboard</a> <span class="glyphicon glyphicon-menu-right"></span> <a href="crud-edu.php">CRUD</a></p>
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
			We beginnen bij create record. Met deze functie maak je de informatie aan. Een voorbeeld hiervan is bij het registreren.
			<pre>CREATE (database, tabel, record) (naam) ;</pre>
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
