<?php include("header.php");?>

<h1>Abonnementen lijst</h1>
<br>
<br>
<table>
<tr>
    <th>id</th>
    <th>naam</th>
	<th>prijs</th>
	<th>bewerking</th>
	</tr>
<?php


$sQuery = "SELECT * from abonementen"; 
     
    $oStmt = $db->prepare($sQuery); 
    $oStmt->execute(); 

	$count = $oStmt->rowCount();
	
	echo"Aantal rijen gevonden op deze query: $count <br><br>";

	//resultaat:
	while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)) 
    {
			$id = 		$aRow["ID"];
			$name = 	$aRow["name"];
			$prijs = $aRow["prijs"];
			
			echo"
			
			<tr>
			<td>$id</td>
			<td>$name</td>
			<td>$prijs</td>
			<td align=\"center\">
			<a href=\"wijzigen.php?id=$id\">wijzigen</a> | 
			<a href=\"verwijderen.php?item=$id\">verwijder</a>
			</td>
			</tr>
			
			";
		
		}

?>

