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
	a{display: inline; float: left;}
  </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><span class="roc">ROCAnarchy</span></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Databases</a></li>
      <li><a href="#">Loginsysteem</a></li>
      <li><a href="#">Registratiesysteem</a></li>
      <li><a href="#">CRUD</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]; ?></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span><a href="Logout.php" class="log-uit">Uitloggen</a></a></li>
    </ul>	
  </div>
</nav>

</body>
</html>