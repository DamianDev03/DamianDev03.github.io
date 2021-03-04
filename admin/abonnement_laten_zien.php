<?php


	$sQuery = "SELECT 	home_abonement.id, 
						home_abonement.ab_id, 
						abonementen.ID, 
						abonementen.name, 
						abonementen.prijs, 
						abonementen.description
				
				FROM home_abonement
				INNER JOIN abonementen
				ON home_abonement.ab_id = abonementen.ID;"; 
		 
		$oStmt = $db->prepare($sQuery); 
		$oStmt->execute(); 

		$count = $oStmt->rowCount();


		while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)) 
		{
				$id = 		$aRow["id"];
				$name = 	$aRow["name"];
				$prijs = $aRow["prijs"];
				$desc = $aRow["description"];
				
				echo"
				<div id=\"abboinforechts\">
					<fieldset>
						<legend><h1>$name</h1></legend>
						<p class=\"info-description\">$desc</p>
						<div class=\"abonement-link-home\">
							<a href=\"abonementinfo.php?id=$id\">Bestel &euro;$prijs</a>
						</div>
					</fieldset>
				</div>
					
				<div id=\"abbofotolinks\">
					<h1>Abonnement foto</h1>
				</div>
				";
			
			}

?>