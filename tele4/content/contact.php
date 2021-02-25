<?php include("../config/db_config.php"); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tele4</title>
	
	<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	  <a href="abonnementen.php">Abonnementen</a>
	  <a class="active" href="contact.php">Contact</a>
	  <div class="login-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Username" name="username">
      <input type="text" placeholder="Password" name="psw">
      <button type="submit">Login</button>
    </form>
  </div>
	</div>

	<div id="container">
	
	<h3>Contact</h3>

<div class="container">
  <form action="/action_page.php">
    <label for="voornaam">Voornaam</label>
    <input type="text" id="voornaam" name="voornaam" placeholder="Je voornaam..">

    <label for="achternaam">Achternaam</label>
    <input type="text" id="achternaam" name="achternaam" placeholder="Je achternaam..">

	<label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Je emailadres..">


    <label for="onderwerp">Onderwerp</label>
    <textarea id="onderwerp" name="onderwerp" placeholder="Schrijf iets.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
		

		
	</div>
</body>
</html>