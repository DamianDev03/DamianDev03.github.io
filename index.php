<?php include("admin/db_config.php"); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tele4</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/style2.css" />
</head>

<body>
	
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="content/overons.php">Over ons</a>
  <a href="content/abonnementen.php">Abonnementen</a>
  <a href="content/contact.php">Contact</a>
</div>
<?php



$sQuery = "SELECT     home_abonement.id, 
home_abonement.ab_id, 
abonementen.id, 
abonementen.name, 
abonementen.prijs, 
abonementen.description

FROM home_abonement
INNER JOIN abonementen
ON home_abonement.ab_id = abonementen.id;";
   
  $oStmt = $db->prepare($sQuery); 
  $oStmt->execute(); 

  $count = $oStmt->rowCount();


  while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)) 
  {
      $id =      $aRow["id"];
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


<br><br>
<div class="footer">
<div class="container">
  <div class="row">
    <div class="col-lg-5 col-xs-12 about-company">
     
  <div class="social-footer-icons">
    <ul class="menu simple">
      <li><a href="https://www.facebook.com/"><i>Facebook</i></a></li>
      <li><a href="https://www.instagram.com/?hl=en"><i>Instagram</i></a></li>
      <li><a href="https://www.pinterest.com/"><i>Pintrest</i></a></li>
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
      <p class="mb-0"><i class="fa fa-phone"></i>06-32538464</p>
      <p><i class="fa fa-envelope"></i>info-tele4@outlook.com</p>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col copyright">
      <p class=""><small class="text-white-50">© 2021. Damian van der Sluis, Yoran de Blaey.</small></p>
    </div>
  </div>
</div>
</body>
</html>