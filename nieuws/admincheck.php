<?php
header('X-XSS-Protection: 0');
session_start();

// Check if admin logged in
if(@$_POST['email'] == 'admin@nieuws.nl' && @$_POST['password'] == 'sesame') {
    $_SESSION['admin'] = true;
}

$connection = new mysqli('localhost', 'nieuws', 'pass', 'nieuws')
    or die('Kan geen verbinding maken met MySQL');

// Add a comment
if(isset($_POST['addcomment'])) {
    $connection->query("INSERT INTO commentaar SET auteur='anoniem', bericht='".$connection->real_escape_string($_POST['comment'])."'");
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
  </head>

<body>

<img src="/themes/images/nieuws.png" id="logo">
<section id="middle">
<div id="datum"><?php setlocale(LC_ALL, 'nl_NL'); echo strftime("%A %e %B %Y"); ?>. Het laatste nieuws het eerst op NIEUWS.nl</div>


<div id="admincheck">
<?php

if($_POST) {
    shell_exec('phantomjs admincheck.js');
    echo '<div class="alert alert-warning">De administrator heeft op '.date('r').' een kijkje op de reactie pagina genomen</div>';
}
?>

    Problemen met de website? Laat het de administrator weten en hij komt een kijkje nemen op de <a href="/nieuws/">reactie pagina</a>.
    <form method="POST">
        <button type="submit" name="submit" class="btn btn-primary">Stuur <?php if($_POST)echo 'nog';?> een berichtje naar de administrator</button>
    </form>
</div>
</section>
</body>
</html>
