

<?php include("db_config.php");
	
if (!isset($_POST['submit'])) {
	
	$voornaam 		= 	htmlspecialchars($_POST['Vname']);
	$achternaam 	= 	htmlspecialchars($_POST['Aname']);
	$email 			= 	htmlspecialchars($_POST['email']);
	
	
	$cookie_full = $_COOKIE["winkelwagen"];
	$cookie_expl = explode(",", $cookie_full);
	$totaal = 0;
	
	try{ 
	$sQuery = "INSERT INTO besteling (id, voornaam, achternaam, email) VALUES (0, :voornaam, :achternaam, :email)";

    $oStmt = $db->prepare($sQuery);
	
	$oStmt->bindParam(':voornaam', $voornaam);
	$oStmt->bindParam(':achternaam', $achternaam); 
	$oStmt->bindParam(':email', $email);
    $oStmt->execute(); 
	

	} catch(PDOException $e) 
	{ 
		$sMsg = '<p> 
				Regelnummer: '.$e->getLine().'<br /> 
				Bestand: '.$e->getFile().'<br /> 
				Foutmelding: '.$e->getMessage().' 
			</p>'; 
		 
		trigger_error($sMsg); 
	}
	
	$sQuery = "SELECT * FROM besteling WHERE id = (SELECT MAX(id) FROM besteling);"; 
     
    $oStmt = $db->prepare($sQuery); 
    $oStmt->execute(); 

	$count = $oStmt->rowCount();

	$complete_naam = "naam:";
	$complete_prijs = "prijs:";

	//resultaat:
	while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)) 
    {
			$besteling_id 		= 		$aRow["id"];
	}
	
	foreach ($cookie_expl as $i) {
		
		try{ 
			$sQuery = "INSERT INTO besteling_items (id, besteling_id, item_id) VALUES (0, :besteling_id, :item_id)";

			$oStmt = $db->prepare($sQuery);
			
			$oStmt->bindParam(':besteling_id', $besteling_id);
			$oStmt->bindParam(':item_id', $i);
			$oStmt->execute(); 

						
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
								
								$complete_naam = $complete_naam.",".$name;
								$complete_prijs = $complete_prijs.",".$prijs;
								
								
								/*echo"
								
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
									
								";*/
							
						}
		

		} catch(PDOException $e) 
		{ 
			$sMsg = '<p> 
					Regelnummer: '.$e->getLine().'<br /> 
					Bestand: '.$e->getFile().'<br /> 
					Foutmelding: '.$e->getMessage().' 
				</p>'; 
			 
			trigger_error($sMsg); 
		}
		
	}
	if (isset($_COOKIE["winkelwagen"])) {
    unset($_COOKIE["winkelwagen"]);
    setcookie("winkelwagen", '', time() - 3600, '/'); // empty value and old timestamp
	$email_body = "<body>"."Email: ".$email."<br>"."Voornaam: ".$voornaam."<br>"."Achternaam: ".$achternaam."<br>".$complete_naam."<br>".$complete_prijs."</body>";
	$headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
	mail("damian@localhost.com", "besteling".$besteling_id, $email_body, $headers);
	echo"
		<div id=\"intropagina\">
			<h1 class=\"abonement-info-name\">
				Bedankt voor uw besteling!
			</h1>
			<div class=\"abonement-link-info\">
				<a href=\"index.php\">Terug</a>
			</div>
		</div>
	";
}

}
?>