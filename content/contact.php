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



  </div>
	</div>

	<div id="container">
	
	<h3 class="contact">Contact</h3>

    <form action="contact.php" method="post">
  <div class="elem-group">
    <label for="name">Je naam</label>
    <input type="text" id="name" name="visitor_name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">Je E-mailadres</label>
    <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
  </div><br>
  <div class="elem-group">
    <label for="department-selection">Kies Betrokken afdeling</label>
    <select id="department-selection" name="concerned_department" required>
        <option value="">Selecteer een afdeling</option>
        <option value="billing">Facturering</option>
        <option value="marketing">Marketing</option>
        <option value="technical support">Technische hulp</option>
    </select>
  </div>
  <div class="elem-group">
    <label for="title">
    Reden om contact met ons op te nemen</label>
    <input type="text" id="title" name="email_title" required placeholder="Kan mijn wachtwoord niet opnieuw instellen" pattern=[A-Za-z0-9\s]{8,60}>
  </div>
  <div class="elem-group">
    <label for="message">Schrijf uw bericht</label>
    <textarea id="message" name="visitor_message" placeholder="Schrijf iets..." required></textarea>
  </div>
  <button type="submit">Verzend bericht</button>
</form>

<?php
  

if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $concerned_department = "";
    $visitor_message = "";
    $email_body = "<div>";
      
    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span>
                        </div>";
    }
 
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span>
                        </div>";
    }
      
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$email_title."</span>
                        </div>";
    }
      
    if(isset($_POST['concerned_department'])) {
        $concerned_department = filter_var($_POST['concerned_department'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Concerned Department:</b></label>&nbsp;<span>".$concerned_department."</span>
                        </div>";
    }
      
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div>
                           <label><b>Visitor Message:</b></label>
                           <div>".$visitor_message."</div>
                        </div>";
    }
      
    if($concerned_department == "billing") {
        $recipient = "damian@localhost.com";
    }
    else if($concerned_department == "marketing") {
        $recipient = "damian@localhost.com";
    }
    else if($concerned_department == "technical support") {
        $recipient = "damian@localhost.com";
    }
    else {
        $recipient = "damian@localhost.com";
    }
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
      
    if(mail($recipient, $email_title, $email_body, $headers)) {
        echo "<p>Bedankt dat je contact met ons hebt opgenomen, $visitor_name. U krijgt binnen 24 uur antwoord op uw bericht.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
      
} else {
    echo '<br><p>Something went wrong</p>';
}
?>

		
</div>
</body>
</html>