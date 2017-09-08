<?php
	session_start();
	
	$rootDir = '../..';
	
	if (!isset($_SESSION["username"])) {
		//if (!isset($_GET["li"])) {
			header("Location: $rootDir/Login.php?login=false");
		//}
		/*else {
			header("Location: $rootDir/Login.php?sessError");
		}*/
	}
	
	include $rootDir.'/Framework/Includes.php';
	
	$title = "Failed to load update...";
	$text = "Failed to load update...";
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
?>
<!DOCTYPE html>
<html lang="nl">
	<head>
	<title>SZP - Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php if (usesSSL) {echo "https";} else {echo "http";} ?>://st27.nl/School/siteIcon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>
		$(document).bind("mobileinit", function() {
			$.mobile.ajaxEnabled = false;
		});
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<style>
			body{background-color: #f5f5f5;}
			.roc{color: #EF5350;}
			.container-fluid:nth-child(4) .col-sm-3.text-center a {bottom: 0; color: #333; left: 0; padding: 60px 59px 0 10px; position: absolute; transition: all 500ms ease 0s; width: 100%;}
			a:hover{text-decoration: none;}
			.glyphicon.glyphicon-fire{color: #808080;}
			h3{border-top-left-radius: 5px; border-top-right-radius: 5px; margin-bottom: 0px;}
			.meer-info{background-color: #fff; border: 1px solid; padding: 75px 0px 5px 15px; text-align: left; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; font-weight: bold;}
			.container-fluid:nth-child(4) .col-sm-3 p.meer-info {border-color: #ffc107; position: relative;}
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
			.container-fluid:nth-child(4) .col-sm-3.text-center a:hover {
				background-color: #dedede;
				border-radius: 3px;
				color: #337ab7;
				padding-top: 60px;
			}
			.container-fluid:nth-child(5) .col-md-4 a {
				bottom: 0;
				color: #333;
				left: 0;
				padding: 105px 110px 0 10px;
				position: absolute;
				transition: all 500ms ease 0s;
				width: 100%;
			}
			.container-fluid:nth-child(5) .col-md-4 a:hover {
				background-color: #dedede;
				border-radius: 3px;
				color: #337ab7;
				padding-top: 105px;
			}
			.container-fluid:nth-child(5) .col-md-4  p{
				position: relative;
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
			.ui-loader { /*Fek off*/
				display: none;
				z-index: 9999999;
				position: fixed;
				top: 50%;
				left: 50%;
				border: 0;
			}
			.noBotMargin {
				margin-bottom: 0px;
			}
			
			.panel-title[data-toggle] {
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid" id="LoadNavbar">
				
			</div>
			<script> 
				$(function(){
					$("#LoadNavbar").load("navbars/NavbarHome.html");
					var interval = setInterval(function(){if ($("#userHref").length) {$("#userHref").append("<?php echo $_SESSION["username"];?>"); clearInterval(interval);}},1);
				});
			</script>
		</nav>

		<div class="container-fluid">
			<div class="container">
			  <div class="jumbotron text-center" style="background-color: #fff; border: 1px solid #e7e7e7;">
				<h1><span class="glyphicon glyphicon-fire" style="color: #EF5350;"></span></h1>
				<p><i>Dan leren we 't zelf wel...</i></p>
			  </div>
			</div>
		</div>

		<div class="container-fluid" id="UpdateFeed">
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
					<p class="meer-info"><a href="edu/database-edu.php">Klik hier voor meer info <span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
				</div>
				<div class="col-sm-3 text-center">
					<h3 style="background-color: #009688; color: #fff; padding: 5px 0px;">Loginsystemen</h3>
					<p class="meer-info"> <a href="edu/login-edu.php"> Klik hier voor meer info <span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
				</div>
				<div class="col-sm-3 text-center">
					<h3 style="background-color: #FFC107; color: #fff; padding: 5px 0px;">Registratiesystemen</h3>
					<p class="meer-info"><a href="edu/registratie-edu.php">Klik hier voor meer info <span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
				</div>
				<div class="col-sm-3 text-center">
					<h3 style="background-color: #E53935; color: #fff; padding: 5px 0px;">CRUD</h3>
					<p class="meer-info"><a href="edu/crud-edu.php">Klik hier voor meer info <span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
				</div>
			</div>
		</div>
		
		<div class="container-fluid">
			<div class="container">
				<div class="col-md-4">
					<h3 style="background-color: #EF6C00; color: #fff; padding: 5px 0px;"" class="text-center">Beveiliging</h3>
					<p style="border-color: #EF6C00;">
					<a href="edu/beveiliging-edu.php">Klik hier voor meer informatie <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</p>
				</div>
				<div class="col-md-4">
					<h3 style="background-color: #00838F; color: #fff; padding: 5px 0px;"" class="text-center">Gastenboek</h3>
					<p style="border-color: #00838F;">
					<a href="edu/gastenboek-edu.php">Klik hier voor meer informatie <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</p>
			</div>
				<div class="col-md-4">
					<h3 style="background-color: #673AB7; color: #fff; padding: 5px 0px;"" class="text-center">webshop</h3>
					<p style="border-color: #673AB7;">
					<a href="edu/webshop-edu.php">Klik hier voor meer informatie <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</p>
			</div>			
			</div>
		</div>
		
		<div class="jumbotron noBotMargin">
			<div class="container" style="max-width: 1080px;">
			<div class="col-md-6">
			  <div class="panel-group" id="accordion">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
					  <a>Gebruikers level</a>
					</h4>
				  </div>
				  <div id="collapse1" class="panel-collapse collapse">
					<div class="panel-body">Vaak heb je meerdere bevoegdheids levels in een systeem. Dit kan dus nog wel eens van pas komen.<br><a href="#" style="font-weight: bold;">Lees meer</a></div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					  <a>databases koppelen</a>
					</h4>
				  </div>
				  <div id="collapse2" class="panel-collapse collapse">
					<div class="panel-body">Een bedrijf heeft meestel meerdere afdelingen of product categorie&#235;n. Deze moeten gekoppeld worden.<br><a href="#" style="font-weight: bold;">Lees meer</a></div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
					  <a>Sessions</a>
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
					<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
					  <a>Zoek functie</a>
					</h4>
				  </div>
				  <div id="collapse4" class="panel-collapse collapse">
					<div class="panel-body">Om een site overzichtelijk te houden is een zoekbalk een goed systeem.<br><a href="#" style="font-weight: bold;">Lees meer</a></div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
					  <a>limiet vaststellen</a>
					</h4>
				  </div>
				  <div id="collapse5" class="panel-collapse collapse">
					<div class="panel-body">Als je database veel records bevat wil je een limiet zetten op de hoeveelheid dat je kan terug vragen. Anders wordt je site langzaam.<br><a href="#" style="font-weight: bold;">Lees meer</a></div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
					  <a>Cookies</a>
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
			var totalposts = <?php echo $totalposts; ?>;
			
			function next () {
				if (current < totalposts) {
					$.ajax("../../Framework/Ajax.php?getupdate="+(current+1), {
						success: function (data) {
							var parsed = JSON.parse(data);
							if (parsed['success']) {
								var arr = parsed['result'];
								if (arr) {
									$("#updateTitle").text(arr["title"]);
									$("#updateMessage").text(arr["text"]);
									current++;
									$("#updateCurrent").text(current);
								}
								$("#updateMessage").fadeIn();
							}
						}
					});
				}
			}
			
			function previous () {
				if (current > 1) {
					$.ajax("../../Framework/Ajax.php?getupdate="+(current-1), {
						success: function (data) {
							var parsed = JSON.parse(data);
							if (parsed['success']) {
								var arr = parsed['result'];
								if (arr) {
									$("#updateTitle").text(arr["title"]);
									$("#updateMessage").text(arr["text"]);
									current--;
									$("#updateCurrent").text(current);
								}
								$("#updateMessage").fadeIn();
							}
						}
					});
				}
			}
			
			$(document).ready(function() {
				
			});
			
			$(document).on('pageinit', function(event){
				$("#UpdateFeed").on("swipeleft", function() {
					if (current < totalposts) {
						$("#updateMessage").fadeOut(500);
						setTimeout(function() {
							next();
						}, 500);
					}
				});
				
				$("#UpdateFeed").on("swiperight", function() {
					if (current > 1) {
						$("#updateMessage").fadeOut(500);
						setTimeout(function() {
							previous();
						}, 500);
					}
				});
			});
		</script>
	</body>
</html>
