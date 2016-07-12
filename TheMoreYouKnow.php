<?php
	$title = "The more you know";
	$titleDing = "Index.";
	
	$text = "<h2>Index</h2>
		<a href='TheMoreYouKnow.php?subject=cookies'>Cookies</a><br>
		<a href='TheMoreYouKnow.php?subject=variabelen'>Variabelen</a><br>
		<a href='TheMoreYouKnow.php?subject=DataTypes'>DataTypes</a><br>
	";
	
	if (isset($_GET["subject"])) {
		if ($_GET["subject"] == "cookies") {
			$title = "Cookies";
			$titleDing = "Wat zijn cookies?";
			$text = "<h2>Cookies</h2>Cookies zijn <a href='TheMoreYouKnow.php?subject=variabelen'>variabelen</a> die worden opgeslagen in de browser. Zo kunnen variabelen makkelijk overgedragen worden van webpagina naar webpagina. Zo kan bijvoorbeeld in een cookie je gebruikersnaam worden opgeslagen en kan een site je naam weergeven zonder dat je bent ingelogd.<br><h2>Levensduur</h2> Cookies hebben een bepaalde levensduur. Deze kan een programmeur instellen. Zo kan een cookie voor een paar uur opgeslagen blijven of voor een paar maanden.";
		}
		else if ($_GET["subject"] == "variabelen") {
			$title = "Variabelen";
			$titleDing = "Wat zijn variabelen?";
			$text = "<h2>Variabelen</h2>Variabelen zijn alles wat je kan invullen. Dingen zoals woorden, zinnen en cijfers. Een goed voorbeeld van een variabel is: \$ditiseenvariabel = '100';<br>De naam van de variabel is dus ditiseenvariabel en de waarde van die variabel is 100. <br><h2>Andere programmeer talen</h2>Let op! In PHP en Javascript wordt automatisch bepaald wat voor <a href='TheMoreYouKnow.php?subject=DataTypes'>data type</a> een variabel is aan de hand van wat je erin stopt. Zo wordt een getal automatisch een Integer en true of false een Boolean. In programmeertalen zoals C#, C++ en Java moet je handmatig instellen wat voor data type een variabel is. Bijvoorbeeld: boolean variabelnaam = false;";
		}
		else if ($_GET["subject"] == "DataTypes") {
			$title = "Data types";
			$titleDing = "Wat zijn data types?";
			$text = "<h2>Data types</h2>Voor elke <a href='TheMoreYouKnow.php?subject=variabelen'>variabel</a> kan je een data type instellen. De data type bepaald wat voor waardes er in je variabel kunnen. Zo kunnen Integers alleen maar hele getallen vasthouden zoals 0, 1, 2, 3 en niet getallen zoals 0.01 of 105.45.<br><h2>Verschillende data types</h2>Hieronder volgt een lijst met de basis verschillende data types.<br><table border='1'><th>Data type</th><th>Waardes</th><tr><td>Integer</td><td>Hele getallen</td></tr><tr><td>Boolean</td><td>True of False</td></tr><tr><td>Float</td><td>Getallen met getallen achter de komma</td></tr></table>";
		}
		else {
			$title = "Niet gevonden";
			$titleDing = "404 uitleg niet gevonden.";
			$text = "<h2>404</h2>Nee serieus, we hebben het niet. Ga maar weer terug naar het dasboard.";
		}
	}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Slideshow</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
	.jumbotron{background-color:#00838F; color: #fff; margin-bottom: 0px;}
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
	  <h1><?php echo $title; ?></h1>
	  <p><?php echo $titleDing; ?></p>
	</div>

<div class="container-fluid"  data-spy="affix" data-offset-top="197" style="background-color: #e8e8e8; z-index: 9999;">
	<div class="container-fluid">
		<div class="container">
			<p><a href="index.php">Dashboard</a> <span class="glyphicon glyphicon-menu-right"></span> <a href="TheMoreYouKnow.php">TheMoreYouKnow</a></p>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<div class="row">
		<p>
			<?php echo $text; ?>
			<hr>
		</p>
		</div>
	</div>
</div>

</body>
</html>
