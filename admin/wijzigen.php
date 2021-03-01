<?php include("header.php");?>

<h1>Wijzigen</h1>
<br>
<br>
<?php 

include("db_config.php");

//Actie uitvoeren als er nog geen SUBMIT is gegeven:
if (!isset($_POST["wijzigen"])) {
	
	$ID = $_GET["id"];

	$sQuery = "SELECT * from abonementen where ID= :ID"; 
     
    $oStmt = $db->prepare($sQuery);
	$oStmt->execute(array('ID' => $ID)); 
    $oStmt->execute(); 

	while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)) 
    {
	
	$ID=		$aRow["ID"];
	$name=		$aRow["name"];
	$prijs=	$aRow["prijs"];
	$description=		$aRow["description"];
		
	}

?>
<h1>Album wijzigen</h1>

<form name="wijzigen" action="" method="POST">
	
<input type="hIDden" name="ID" value="<?php echo"$ID";?>">

<input type="text" name="name" size="50" value="<?php echo"$name";?>"> <br>
<input type="text" name="prijs" size="50" value="<?php echo"$prijs";?>"> <br>
<textarea name="description" rows="4" cols="50"><?php echo"$description";?></textarea> <br>
	
<input type="submit" name="wijzigen" value="wijzigen">
	
</form>

<?php
}
else {
	
$ID=		htmlspecialchars($_POST["ID"]);
$name= 	htmlspecialchars($_POST["name"]);
$prijs= 	htmlspecialchars($_POST["prijs"]);
$description= 	htmlspecialchars($_POST["description"]);

try
		{
			
			$mijneigenquerynaam = "
						UPDATE abonementen SET 

						name= 			:name,
						prijs= 			:prijs,
						description= 	:description
							
						WHERE ID 	= 	:ID
			";
			
			$stmt = $db->prepare($mijneigenquerynaam);
			$stmt->execute(array(
			
			':name' 		=> $name,
			':prijs' 		=> $prijs,
			':description' 	=> $description,
			':ID' 			=> $ID
			
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

<a href="list.php">Terug naar het overzichtje</a>

<?php include("footer.php");?>