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

<div class="topnav">
	  <a href="../index.php">Home</a>
	  <a href="overons.php">Over ons</a>
	  <a href="abonnementen.php">Abonnementen</a>
	  <a href="contact.php">Contact</a>
	  <a class="active" href= "cart.php"><i class="fa fa-shopping-cart"></i></a> 
</div>
<div id="cart-content">

<?php
	include("db_config.php");

	$cookie_name = "winkelwagen";
	if(!isset($_COOKIE[$cookie_name])) {
		echo "<h1>Je hebt nog niets in je winkelwagen!</h1>";
	} else {
		$cookie_full = $_COOKIE["winkelwagen"];
		$cookie_expl = explode(",", $cookie_full);
		$totaal = 0.00;
		echo "
		
			<div class=\"parent-cart-grid\">
				<div class=\"cart-grid1\">
					
					<h1>Winkelwagen</h1><br>";
					
					foreach ($cookie_expl as $i) {
						
						$sQuery = "SELECT * FROM abonementen WHERE ID = $i;"; 
					 
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
								
								$totaal = $totaal + (float)$prijs;
								
								echo"
								
									<hr><div class=\"cart-item\">
										<div class=\"parent\">
											<div class=\"div1\">
											
												<div class=\"cart-item-name\">
													$name
												</div>
												&euro;$prijs
											
											</div>
											<div class=\"div2\">
												<div class=\"cancel-link-container\">
													<a class=\"cancel-link\" href=\"cart_remove.php?id=$id\"><i class=\"fas fa-trash-alt\"></i></a>
												</div>
											</div>
										</div>
										
									</div>
									
								";
							
							}
						
					}
					
					echo"
					
			</div>
				<div class=\"cart-grid2\">
					
					<form action=\"koop.php\" method=\"post\">
						
						<h2>Totaal: &euro;$totaal</h2>
						<hr>
						Voornaam: <input type=\"text\" name=\"Vname\" placeholder=\"Uw voornaam\"><br>
						Achternaam: <input type=\"text\" name=\"Aname\" placeholder=\"Uw achternaam\"><br>
						E-mail: <input type=\"text\" name=\"email\" placeholder=\"Uw Email\"><br>
						<hr>
						<input type=\"submit\" value=\"Bestel\" id=\"cart-bestel\">
						
					</form>
					
					
				</div>
			</div>
			
			";
		
	}
	
?>

</div>





</body>
</html>