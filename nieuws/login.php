<?php
if($_POST) {
    // Check if admin logged in
    $connection = new mysqli('localhost', 'nieuws', 'pass', 'nieuws')
        or die('Kan geen verbinding maken met MySQL');

    $hash = sha1($_POST['wachtwoord'] . '31pEDJUu8bh0lUB9');

    // Check password user, no SQL injection here people!
    $result = $connection->query("SELECT * FROM gebruikers WHERE gebruikersnaam = '".$connection->real_escape_string($_POST['gebruikersnaam'])."' AND wachtwoord = '".$connection->real_escape_string($hash)."'");

    if($result->num_rows > 0) {
        session_start();
        unset($_SESSION['gebruikersnaam']);
        unset($_SESSION['admin']);

        if($_POST['gebruikersnaam'] == 'Admin')
            $_SESSION['admin'] = true;

        $_SESSION['gebruikersnaam'] = $_POST['gebruikersnaam'];

        header('Location: /nieuws/index.php');
        exit;
    }
}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>NIEUWS.nl</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Paul Wagener">

    <link id="callCss" rel="stylesheet" href="/themes/css/bootstrap.min.css" media="screen"/>
	<link href="/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="/themes/css/nieuws.css" media="screen"/>

  <!-- De code in dit bestand is met opzet slecht en zeer onveilig opgezet.
       GEBRUIK DEZE CODE NIET als referentiemateriaal voor je eigen PHP projecten! -->

     <style>
     input {
         margin-bottom: 5px;
         width: 50% !important;
     }

     </style>
  </head>

<body>

<img src="/themes/images/nieuws.png" id="logo">
<section id="middle">
<div id="datum"><?php setlocale(LC_ALL, 'nl_NL'); echo strftime("%A %e %B %Y"); ?>. Het laatste nieuws het eerst op NIEUWS.nl</div>

  <form method="POST" class="form-signin">
      <?php
      if($_POST) {
          echo '<div class="alert alert-error">Ongeldige gebruikersnaam en wachtwoord</div>';
      }
      ?>
      <input name="gebruikersnaam" class="input-block-level" placeholder="Gebruikersnaam">
      <input name="wachtwoord" type="pasword" class="input-block-level" placeholder="Wachtwoord">

      <button type="submit" class="btn btn-primary">Inloggen</button>
  </form>
</section>

</body>
</html>
