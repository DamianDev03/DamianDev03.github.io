<?php include("header.php");?>
<?php

include("db_config.php");
	
		$id = $_GET["item"];

		$mijnQuery = "DELETE FROM abonementen WHERE ID = :id";

		$oStmt = $db->prepare($mijnQuery);
		$oStmt->bindParam(':id', $id, PDO::PARAM_INT);   
		$oStmt->execute();

		echo"<br><br><h3>Het abonement is verwijderd!</h3>";

?>

<h3><a href="list.php">Terug</a></h3>

