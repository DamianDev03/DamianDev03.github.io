<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tele4</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>


<body id="abbonomenten">
<div class="topnav">
	  <a href="../index.php">Home</a>
	  <a href="overons.php">Over ons</a>
	  <a href="abonnementen.php">Abonnementen</a>
	  <a href="contact.php">Contact</a>
	  <a href= "content/cart.php"><i class="fa fa-shopping-cart"></i></a> 
</div>

<?php
	include("db_config.php");
	$pageid = $_GET['id'];

?>



<?php


$sQuery = "SELECT * FROM abonementen WHERE ID = $pageid;"; 
     
    $oStmt = $db->prepare($sQuery); 
    $oStmt->execute(); 

	$count = $oStmt->rowCount();
	

	//resultaat:
	while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)) 
    {
			$id 		= 		$aRow["ID"];
			$name 		= 		$aRow["name"];
			$prijs 		= 		$aRow["prijs"];
			$desc 		= 		$aRow["description"];
			
			echo"
			
			<div id=\"intropagina\">
				<h1 class=\"abonement-info-name\">
					$name
				</h1>
			</div>
			
			
			<div id=\"abonement-info-content\">
				<div class=\"parent\">
					<div class=\"div1grid\">
						<h1>Info</h1>
						<hr>
						<p>$desc</p>
					</div>
					<div class=\"div2grid\">
						<h1>&euro;$prijs</h1>
						<hr>
						<div class=\"abonement-link-info\">
							<a href=\"add_cart.php?id=$pageid\">Toevoegen aan winkelwagen</a>
						</div>
					</div>
				</div>
			</div>
			
			";
		
		}

?>
</body>
</html>