<?php include("header.php");?>
<?php

include("db_config.php");
	
		$id = $_GET["id"];

		$mijnQuery = "DELETE FROM `besteling` WHERE id = $id;";

		$oStmt = $db->prepare($mijnQuery);  
		$oStmt->execute();
		
		$mijnQuery = "DELETE FROM `besteling_items` WHERE  besteling_id = $id;";

		$oStmt = $db->prepare($mijnQuery);  
		$oStmt->execute();

		echo"<br><br><h3>De Besteling is verwijderd!</h3>";

?>

<h3><a href="bestelingen.php">Terug</a></h3>

<?php include("footer.php");?>