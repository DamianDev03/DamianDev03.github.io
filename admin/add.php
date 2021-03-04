<?php include("header.php");?>

<h1>Abonementen toevoegen</h1>
<br>
<br>
<?php


//Actie uitvoeren als er nog geen submit is gegeven:
if (!isset($_POST["toevoegen"])) {
?>
	
<form name="invoeren" action="" method="POST">

<input type="text" name="naam" size="50" placeholder="naam"> <br>
<input type="text" name="prijs" size="50" placeholder="prijs"> <br>
<textarea name="description" rows="4" cols="50">Zet hier de info van de abonement</textarea> <br>
	
<input type="submit" name="toevoegen" value="toevoegen">

</FORM>

<?php } 
	
	//Nu de actie als formulier ingevuld verzonden is:
	else {
		
	$naam				= htmlspecialchars($_POST['naam']);
	$prijs				= doubleval(htmlspecialchars($_POST['prijs']));
	$description		= htmlspecialchars($_POST['description']);
	
try{ 
	$sQuery = "INSERT INTO abonementen (ID, name, prijs, description) VALUES (0, :name, :prijs, :description)";

    $oStmt = $db->prepare($sQuery);
	
	$oStmt->bindParam(':name', $naam);
	$oStmt->bindParam(':prijs', $prijs); 
	$oStmt->bindParam(':description', $description);
    $oStmt->execute(); 
	
	echo"<br><br><h3>Abonement $naam is toegevoegd!<h3><br>";

	}


catch(PDOException $e) 
{ 
    $sMsg = '<p> 
            Regelnummer: '.$e->getLine().'<br /> 
            Bestand: '.$e->getFile().'<br /> 
            Foutmelding: '.$e->getMessage().' 
        </p>'; 
     
    trigger_error($sMsg); 
} 
	
	}


?>
