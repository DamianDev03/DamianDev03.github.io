<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" href="style/adminstyle.css">
	</head>
	<body>
		<div id="Admin-Header">
		
			<p>Tele4 Admin</p>
			<ul>
				<li>
					<a href="index2.php">Home</a>
				</li>
				<li>
					<a href="add.php">Abonement Toevoegen</a>
				</li>
				<li>
					<a href="list.php">Abonement Lijst</a>
				</li>
				<li>
					<a href="home_abonement.php">Home Abonnement</a>
				</li>
				<li>
					<a href="bestelingen.php">Bestelingen</a>
				</li>
				
			</ul>
		
		</div>
		<div id="content">
		<?php include("db_config.php"); ?>