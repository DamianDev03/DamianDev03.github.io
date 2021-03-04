<?php include("header.php");?>

<h1>Home Abonement</h1>
<br>
<br>
<h3>Kies abonement die op de home pagina komt:</h3>
<form name="invoeren" action="" method="POST">
	<select name="homeab" id="homeab">
	<?php


	$sQuery = "SELECT * from abonementen"; 
		 
		$oStmt = $db->prepare($sQuery); 
		$oStmt->execute(); 

		$count = $oStmt->rowCount();

		//resultaat:
		while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)) 
		{
				$id = 		$aRow["id"];
				$name = 	$aRow["name"];
				$prijs = $aRow["prijs"];
				
				echo"
				<option value=\"$id\">$name</option>
				";
			
			}

	?>
	</select>
	<input type="submit" name="veranderen" value="veranderen">
	
	<?php
	if (!isset($_POST["veranderen"])) {
	}else{
		$abid = htmlspecialchars($_POST["homeab"]);
		
		try
		{
			
			$mijneigenquerynaam = "
						UPDATE home_abonement SET 

						ab_id= 			:ab_id
							
						WHERE id 	= 	1
			";
			
			$stmt = $db->prepare($mijneigenquerynaam);
			$stmt->execute(array(
			
			':ab_id' 		=> $abid
			
			));
			
			echo"<br><br><h3>Wijzigen is gelukt!!</h3><br>";
			
		}
		
		catch(PDOException $e)
		{
			echo '<pre>';
			echo 'Regel: '.$e->getLine().'<br>';
			echo 'Bestand: '.$e->getFile().'<br>';
			echo 'Foutmelding: '.$e->getMessage();
			echo '</pre>';
		}	
	}
	?>

</form>

<?php include("footer.php");?>