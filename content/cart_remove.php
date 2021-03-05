
<?php
	
	$pageid = $_GET['id'];
	
	
?>

<?php
	
	$cookie_full = $_COOKIE["winkelwagen"];
	$cookie_expl = explode(",", $cookie_full);
	
	foreach($cookie_expl as $key => $value) {
		if($pageid == $value){
			unset($cookie_expl[$key]);
			break;
		}
	}
	$cookie_processed = implode(",", $cookie_expl);
	setcookie("winkelwagen", $cookie_processed, time() + (86400 * 30), "/"); // 86400 = 1 day
	
?>

<div id="intropagina">
	<h1 class="abonement-info-name">
		Abonement verwijdert uit de winkelwagen!
	</h1>
	<div class="abonement-link-info">
		<a href="cart.php">Terug</a>
	</div>
</div>


<?php
/*

$sQuery = "SELECT * FROM abonementen WHERE ID = $pageid;"; 
     
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
			
			$cookie_name = "winkelwagen";
			$cookie_value = "$id";
			if(!isset($_COOKIE[$cookie_name])) {
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
			} else {
				$cookie_complete = $_COOKIE[$cookie_name].",".$cookie_value;
				setcookie($cookie_name, $cookie_complete, time() + (86400 * 30), "/"); // 86400 = 1 day
			}
			
			echo"
			
			<div id=\"intropagina\">
				<h1 class=\"abonement-info-name\">
					$name is toegevoegt aan je winkelwagen!
				</h1>
				<div class=\"abonement-link-info\">
							<a href=\"abonementinfo.php?id=$pageid\">Terug</a>
				</div>
			</div>
			
			
			";
		
		}
*/
?>





    


</body>
</html>