<?php
	session_start();
	include 'Includes.php';

	if (!isset($_SESSION["username"])) {
		header("Location: Login.php?login=false");
	}
	
	$title = "Failed to load update...";
	$text = "Faied to load update...";
	$totalposts = 1;
	
	if ($conn = Connect()) {
		if ($result = Query("updates", "SELECT * FROM updates WHERE id = '1'")) {
			while ($row = mysqli_fetch_array($result)) {
				$title = $row["title"];
				$text = $row["text"];
			}
		}
		if ($result = Query("updates", "SELECT COUNT(*) FROM updates")) {
			if ($result) {
				while ($row = mysqli_fetch_array($result)) {
					$totalposts = $row[0];
				}
			}
		}
	}
	
	if (isset($_REQUEST["getupdate"])) {
		if ($conn = Connect()) {
			if (preg_replace('/[^A-Za-z0-9\-]/', '', $_GET['getupdate']) != $_GET['getupdate']) {
				echo json_encode(['success' => false]); //TODO: Make an Ajax.php in which we will do all Ajax calls containing just PHP functions. So things don't mess up.
				return;
			}
			if ($result = Query("updates", "SELECT * FROM updates WHERE id = '".$_GET['getupdate']."'")) {
				if ($result) {
					echo json_encode(mysqli_fetch_array($result));
					return;
				}
				else {
					echo json_encode(['success' => false]);
					return;
				}
			}
			else {
				echo json_encode(['success' => false]);
				return;
			}
		}
		else {
			echo json_encode(['success' => false]);
			return;
		}
	}
?>

<!DOCTYPE html>
<html lang="nl">
	<head>
	<title>ROCAnarchy - Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="http://st27.nl/School/siteIcon.png">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
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
			body .jumbotron:nth-child(2){margin-bottom: 0px;}
			.container-fluid:nth-child(5) .col-md-4 > p{
				background-color: #fff;
				border: 1px solid;
				padding: 120px 0px 5px 15px;
				text-align: left; 
				border-bottom-left-radius: 5px; 
				border-bottom-right-radius: 5px;
				font-weight: bold;
			}
			.zoeken {
				background-color: #808080;
				border: none;
				height: 49px;
				width: 300px;
				padding: 20px;
				color: #d1d1d1;
				font-size: larger;
				box-shadow: 0px 0px 10px #707070 inset;
				display: none;
			}
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
				  <li class="active"><a href="#">Home</a></li>
				  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Onderwerpen <span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="database-edu.php">Databases</a></li>
					  <li><a href="login-edu.php">Loginsystemen</a></li>
					  <li><a href="registratie-edu.php">Registratiesystemen</a></li>
					  <li><a href="crud-edu.php">CRUD</a></li>
					  <li><a href="beveiliging-edu.php">Beveiliging</a></li>
					  <li><a href="gastenboek-edu.php">Gastenboek</a></li>
					  <li><a href="webshop-edu.php">Webshop</a></li>
					</ul>
				  </li>
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
			  <div class="jumbotron text-center" style="background-color: #fff; border: 1px solid #e7e7e7;">
				<h1><span class="glyphicon glyphicon-fire" style="color: #EF5350;"></span></h1>
				<p><i>Dan leren we 't zelf wel...</i></p>
			  </div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="container">
			<div class="jumbotron" style="background-color: #8ad9f1; border-radius: 5px; border: 1px solid #46c3e9; margin-bottom: 0px;">
				<h4 id="updateTitle"><?php echo $title; ?></h4>
				<div id="updateMessage">
					<?php echo $text; ?>
				</div>
				<span style="float:right;">&nbsp;<span id="updateCurrent">1</span>/<?php echo $totalposts; ?></span>
				<span class="glyphicon glyphicon-chevron-right" onclick="next();" style="float:right; cursor:pointer;"></span>		
				<span class="glyphicon glyphicon-chevron-left" onclick="previous();" style="float:right; cursor:pointer;"></span>
			</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="container">
				<div class="col-sm-3 text-center">
					<h3 style="background-color: #3F51B5; color: #fff; padding: 5px 0px;">Databases</h3>
					<p class="meer-info"><a href="database-edu.php">Klik hier voor meer info <span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
				</div>
				<div class="col-sm-3 text-center">
					<h3 style="background-color: #009688; color: #fff; padding: 5px 0px;">Loginsystemen</h3>
					<p class="meer-info"> <a href="login-edu.php"> Klik hier voor meer info <span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
				</div>
				<div class="col-sm-3 text-center">
					<h3 style="background-color: #FFC107; color: #fff; padding: 5px 0px;">Registratiesystemen</h3>
					<p class="meer-info"><a href="registratie-edu.php">Klik hier voor meer info <span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
				</div>
				<div class="col-sm-3 text-center">
					<h3 style="background-color: #E53935; color: #fff; padding: 5px 0px;">CRUD</h3>
					<p class="meer-info"><a href="crud-edu.php">Klik hier voor meer info <span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
				</div>
			</div>
		</div>
		
		<div class="container-fluid">
			<div class="container">
				<div class="col-md-4">
					<h3 style="background-color: #EF6C00; color: #fff; padding: 5px 0px;"" class="text-center">Beveiliging</h3>
					<p style="border-color: #EF6C00;">
					<a href="beveiliging-edu.php">Klik hier voor meer informatie <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</p>
				</div>
				<div class="col-md-4">
					<h3 style="background-color: #00838F; color: #fff; padding: 5px 0px;"" class="text-center">Gastenboek</h3>
					<p style="border-color: #00838F;">
					<a href="gastenboek-edu.php">Klik hier voor meer informatie <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</p>
			</div>
				<div class="col-md-4">
					<h3 style="background-color: #673AB7; color: #fff; padding: 5px 0px;"" class="text-center">webshop</h3>
					<p style="border-color: #673AB7;">
					<a href="webshop-edu.php">Klik hier voor meer informatie <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</p>
			</div>			
			</div>
		</div>
		
		<div class="jumbotron">
			<div class="container" style="max-width: 1080px;">
			<div class="col-md-6">
			  <div class="panel-group" id="accordion">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Gebruikers level</a>
					</h4>
				  </div>
				  <div id="collapse1" class="panel-collapse collapse">
					<div class="panel-body">Vaak heb je meerdere bevoegdheids levels in een systeem. Dit kan dus nog wel eens van pas komen.<br><a href="#" style="font-weight: bold;">Lees meer</a></div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">databases koppelen</a>
					</h4>
				  </div>
				  <div id="collapse2" class="panel-collapse collapse">
					<div class="panel-body">Een bedrijf heeft meestel meerdere afdelingen of product categorie&#235;n. Deze moeten gekoppeld worden.<br><a href="#" style="font-weight: bold;">Lees meer</a></div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Sessions</a>
					</h4>
				  </div>
				  <div id="collapse3" class="panel-collapse collapse">
					<div class="panel-body">Uitleg over onderwerp 3.</div>
				  </div>
				</div>
			  </div>
			</div>

			<div class="col-md-6">
			  <div class="panel-group" id="accordion">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Zoek functie</a>
					</h4>
				  </div>
				  <div id="collapse4" class="panel-collapse collapse">
					<div class="panel-body">Om een site overzichtelijk te houden is een zoekbalk een goed systeem.<br><a href="#" style="font-weight: bold;">Lees meer</a></div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">limiet vaststellen</a>
					</h4>
				  </div>
				  <div id="collapse5" class="panel-collapse collapse">
					<div class="panel-body">Als je database veel records bevat wil je een limiet zetten op de hoeveelheid dat je kan terug vragen. Anders wordt je site langzaam.<br><a href="#" style="font-weight: bold;">Lees meer</a></div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Cookies</a>
					</h4>
				  </div>
				  <div id="collapse6" class="panel-collapse collapse">
					<div class="panel-body"><a href="TheMoreYouKnow.php?subject=cookies">Cookie's</a> zijn <a href="TheMoreYouKnow.php?subject=cookies">variabelen</a> die opgeslagen worden in je browser. Zo kunnen de variabelen makkelijk overgedragen worden van webpagina naar webpagina.</div>
				  </div>
				</div>
			  </div>
			</div>			
			</div>
		</div>

		<script>
			var current = 1;
			
			function next () {
				$.ajax("index.php?getupdate="+(current+1), {
					success: function (data) {
						var arr = JSON.parse(data);
						if (arr) {
							$("#updateTitle").text(arr["title"]);
							$("#updateMessage").text(arr["text"]);
							current++;
							$("#updateCurrent").text(current);
						}
					}
				});
			}
			
			function previous () {
				$.ajax("index.php?getupdate="+(current-1), {
					success: function (data) {
						var arr = JSON.parse(data);
						if (arr) {
							$("#updateTitle").text(arr["title"]);
							$("#updateMessage").text(arr["text"]);
							current--;
							$("#updateCurrent").text(current);
						}
					}
				});
			}
			
			$(document).ready(function(){
				
			});			
		</script>

	</body>
</html>
