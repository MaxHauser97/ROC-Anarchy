<?php
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location: Login.php?login=false");
	}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Webshop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php if (usesSSL) {echo "https";} else {echo "http";} ?>://st27.nl/School/siteIcon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
	.jumbotron{background-color:#673AB7; color: #fff; margin-bottom: 0px;}
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
	  <h1>Webshop</h1>
	  <p>Een volledig werkend Webshop</p>
	</div>

<div class="container-fluid"  data-spy="affix" data-offset-top="197" style="background-color: #e8e8e8; z-index: 9999;">
	<div class="container-fluid">
		<div class="container">
			<p><a href="index.php">Dashboard</a> <span class="glyphicon glyphicon-menu-right"></span> <a href="webshop-edu.php">Webshop</a></p>
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
			  <a href="#" class="list-group-item">Webshop</a>
			</div>
			</p>
			</div>
			<div class="col-md-6 text-center">
			<span class="glyphicon glyphicon-shopping-cart" style="color: #808080; font-size: 100px; margin-top: 140px;"></span>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h2>Webshop</h2></div>
		</div>
		
		<div class="row">
		<p>

			<hr>
		</p>
		</div>
	</div>
</div>

</body>
</html>
