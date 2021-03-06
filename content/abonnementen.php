<?php include("../Admin/db_config.php"); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tele4</title>
	
	<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>

<body>
	
<div class="topnav">
	<a href="../index.php">Home</a>
	<a href="overons.php">Over ons</a>
	<a class="active" href="abonnementen.php">Abonnementen</a>
	<a href="contact.php">Contact</a>
  <a href= "cart.php"><i class="fa fa-shopping-cart"></i></a> 
</div>

<div id="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="kopje">
        <br><h1>Abonnementen</h1><br><br><br>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <?php
    	$sQuery = "SELECT * from abonementen";

    		$oStmt = $db->prepare($sQuery); 
    		$oStmt->execute(); 

    		$count = $oStmt->rowCount();

    		//resultaat:
    		while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)) 
    		{
    				$id = 		$aRow["ID"];
    				$name = 	$aRow["name"];
    				$prijs = $aRow["prijs"];
    				$desc = $aRow["description"];
        
    				echo"
              <div class=\"col-sm-3\">
                <div class=\"abonnement\">
                  <div class=\"abovak\">
                    <div class=\"titel\">
                      <h3>$name</h3>
                    </div>
                    <div class=\"foto\">
                      <img src=\"../images/phones.png\" alt=\"3 telefoons\" width=\"300px\" height=\"300px\">
                    </div>
                    <div class=\"info\">
                      <h5>$desc</h5>
                      <h5>$prijs</h5>
                    </div>
                    <div class=\"knop\">
                      <a href=\"abonementinfo.php?id=$id\"><h5>Meer info</h5></a>
                    </div>
                  </div>
                </div>
              </div>
    				";
    			}
    ?>
  </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
<div class="container">
  <div class="row">
    <div class="col-lg-5 col-xs-12 about-company">
     
  <div class="social-footer-icons">
  <h4 class="mt-lg-0 mt-sm-3">Social media</h4>
    <ul class="menu simple">
      <li><a href="https://www.facebook.com/"><i>Facebook</i></a></li>
      <li><a href="https://nl.linkedin.com/"><i>LinkedIn</i></a></li>
      <li><a href="https://twitter.com/?lang=en"><i>Twitter</i></a></li>
    </ul>
  </div>
    </div>
    <div class="col-lg-3 col-xs-12 links">
      <h4 class="mt-lg-0 mt-sm-3">Links</h4>
        <ul class="m-0 p-0">
          <li>- <a href="../index.php">Home</a></li>
          <li>- <a href="overons.php">Over ons</a></li>
          <li>- <a href="abonnementen.php">Abonnementen</a></li>
          <li>- <a href="contact.php">Contact</a></li>
        </ul>
    </div>
    <div class="col-lg-4 col-xs-12 location">
      <h4 class="mt-lg-0 mt-sm-4">Location</h4>
      <p>Meester F.J. Haarmanweg 56-32, 4538 AS Terneuzen</p>
      <p class="mb-0"><i class="fa fa-phone"></i>0900 – 141414</p>
      <p class="mb-0"><i class="fa fa-phone"></i>06 14141422</p>
      <p><i class="fa fa-envelope"></i>info-tele4@outlook.com</p>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col copyright">
      <p class=""><small class="text-white-50">© 2021. Damian van der Sluis, Yoran de Blaey.</small></p>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>