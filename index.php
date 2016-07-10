<?php
	session_start();

	if (!isset($_SESSION["username"])) {
		header("Location: Login.php?login=false");
	}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <title>ROCAnarchy - Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
	body{background-color: #f5f5f5;}
	.roc{color: #EF5350;}
	a{color: #333;}
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
        <li><a href="database-edu.php">Databases</a></li>
        <li><a href="login-edu.php">Loginsysteem</a></li>
        <li><a href="registratie-edu.php">Registratiesysteem</a></li>
        <li><a href="crud-edu.php">CRUD</a></li>
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
	  <div class="jumbotron text-center">
		<h1><span class="glyphicon glyphicon-fire" style="color: #EF5350;"></span></h1>
		<p><i>Dan leren we 't zelf wel...</i></p>
	  </div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
			<div class="col-sm-3 text-center">
			<h3 style="background-color: #3F51B5; color: #fff; padding: 5px 0px;">Databases</h3>
			<p class="meer-info"><a href="database-edu.php">Klik hier voor meer info</a> <span class="glyphicon glyphicon-circle-arrow-right"></span></p>

			</div>
			<div class="col-sm-3 text-center">
			<h3 style="background-color: #009688; color: #fff; padding: 5px 0px;">Loginsystemen</h3>
			<p class="meer-info"> <a href="login-edu.php"> Klik hier voor meer info</a> <span class="glyphicon glyphicon-circle-arrow-right"></span></p>
			</div>
			<div class="col-sm-3 text-center">
			<h3 style="background-color: #FFC107; color: #fff; padding: 5px 0px;">Registratiesystemen</h3>
			<p class="meer-info"><a href="registratie-edu.php"> Klik hier voor meer info</a> <span class="glyphicon glyphicon-circle-arrow-right"></span></p>
			</div>
			<div class="col-sm-3 text-center">
			<h3 style="background-color: #E53935; color: #fff; padding: 5px 0px;">CRUD</h3>
			<p class="meer-info"><a href="crud-edu.php">Klik hier voor meer info</a> <span class="glyphicon glyphicon-circle-arrow-right"></span></p>
			</div>
	</div>
</div>


</body>
</html>
