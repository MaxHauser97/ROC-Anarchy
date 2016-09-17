<?php
if(isset($_POST["inloggen"])){
$conn  = new mysqli_query("localhost","root","root","newDB");

$result = mysqli_query($conn, "SELECT * FROM employees");

while($row = mysqli_fetch_array($result)) {
 echo $row["Lastname"]; 
}
}
?>


<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .menu{
  float: right;
  font-size: 25px;
  color: #d8d8d8;
  padding: 10px;
  display: inline;
  z-index: 9999;
  position: absolute;
  padding-top: 6px;
  transition: 0.3s;
  }
  .menu:hover{color: #808080; cursor: pointer;}
  .zoeken{
	  background-color: #fff; 
	  color: #EF5350;
	  width: 50%;
	  margin: 0 auto;
	  border-color: #EF5350;
	  transition: 0.3s;
  }
  .zoeken:hover{
  background-color: #EF5350;
  color: #fff;
  }
  
input.middle:focus {
    outline-width: 0;
}

.container-fluid{margin-bottom: 30px;}
.container-fluid:first-child{display: none;}
.container-fluid:last-child{margin-top: 10%;}
  </style>
</head>

<body style="background-color: #f9f9f9">
  <div class="container-fluid">
	<div class="container">
	<div class="well text-center" style="background-color: #fff; border: 1px solid #f1f1f1; margin-top: 2%;">	
		<div class="row">
			<div class="col-md-12">
			  <form role="form">
				<div class="form-group" style="margin-bottom: 0px;">
				  <div class="col-xs-1 text-center">
					<span class="glyphicon glyphicon-fire" style="color: #EF5350; font-size: 30px;"></span>
				  </div>
				  <div class="col-xs-8">
					<input class="form-control" id="ex3" type="text" placeholder="Zoek naar SQL, PHP, JQUERY, JAVASCRIPT en BOOTSTRAP functies ">
				  </div>				  
				  <div class="col-xs-2">
					<input class="form-control zoeken" id="ex3" type="submit" value="Zoeken">
				  </div>
				  <div class="col-xs-1">
					<span class="glyphicon glyphicon-menu-hamburger menu"></span>
				  </div>				  
				</div>
			  </form>
				</div>
			</div>
		</div>
		</div>
	</div> 
	
	
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="jumbotron" style="background-color: #fff; border: 1px solid #f1f1f1;">
						<form role="form">
						<div class="form-group">
						<input type="text" class="form-control" autofocus id="gebruikersnaam" placeholder="Gebruikersnaam">
						</div>
						<div class="form-group">
						<input type="password" class="form-control" id="pwd" placeholder="Wachtwoord">
						</div>
						<input type="submit" value="Inloggen" class="btn btn-default" name="inloggen" style="width: 100%;"></input>
						</form>						
					</div>
				</div>
				<div class="col-md-4">
				
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>

