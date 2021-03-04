<?php include("header.php");?>

<h1>Besteling lijst</h1>
<br>
<br>

<?php


	$sQuery = "SELECT * from besteling"; 
     
    $oStmt = $db->prepare($sQuery); 
    $oStmt->execute(); 

	$count = $oStmt->rowCount();
	

	//resultaat:
	while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)) 
    {
			$id 			= 		$aRow["id"];
			$voornaam 		= 		$aRow["voornaam"];
			$achternaam 	= 		$aRow["achternaam"];
			$email 			= 		$aRow["email"];
			
			echo"<br><hr><br><h2>Besteling id: $id <br>
			Voornaam: $voornaam<br>
			Achternaam: $achternaam<br>
			Email: $email<br></h2>";
			$sQuery = "SELECT besteling_items.id, besteling_items.besteling_id, besteling_items.item_id, besteling.id, besteling.voornaam,
				besteling.achternaam, 	besteling.email,
				abonementen.ID, abonementen.name, abonementen.prijs
				FROM ((`besteling_items`

				INNER JOIN besteling ON besteling_items.besteling_id = besteling.id)
					 INNER JOIN abonementen ON besteling_items.item_id = abonementen.ID)

				WHERE `besteling_id` = $id;"; 
     
			$oStmt2 = $db->prepare($sQuery); 
			$oStmt2->execute(); 

			$count = $oStmt2->rowCount();
			
			echo"
			<table>
				<tr>
					<th>Abonement</th>
					<th>prijs</th>
				</tr>
			
			";
			

			//resultaat:
			while($bRow = $oStmt2->fetch(PDO::FETCH_ASSOC)) 
			{
					$abonementnaam 	= 		$bRow["name"];
					$abonementprijs = 		$bRow["prijs"];
					
					
					echo"
			
					<tr>
						<td>$abonementnaam</td>
						<td>$abonementprijs</td>
					</tr>
					";
					
					
					
			}
			
			
			echo "</table>
					
			<br>
			<a href=\"delete_besteling.php?id=$id\">Verwijderen</a>
			<br>
			";
			
			
			
			/*echo"
			
			<tr>
			<td>$id</td>
			<td>$name</td>
			<td>$prijs</td>
			<td align=\"center\">
			<a href=\"wijzigen.php?id=$id\">wijzigen</a> | 
			<a href=\"verwijderen.php?item=$id\">verwijder</a>
			</td>
			</tr>
			
			";*/
		
		}

?>

<?php include("footer.php");?>