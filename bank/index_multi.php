<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Poespas Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Paul Wagener">

    <link id="callCss" rel="stylesheet" href="/themes/bank/bank.css" media="screen"/>
    <link id="callCss" rel="stylesheet" href="/themes/css/bootstrap.min.css" media="screen"/>
	<link href="/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
  </head>

  <!-- De code in dit bestand is met opzet slecht en zeer onveilig opgezet.
       GEBRUIK DEZE CODE NIET als referentiemateriaal voor je eigen PHP projecten! -->

<body>
<div id="header">
<div class="container">

<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
    <a class="brand" href="/bank"><img src="/themes/images/poespas.png" title="De bank die u kunt vertrouwen"></a>
</div>
</div>
</div>

<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">


    <p>Welkom bij de Poespas Bank. De bank die u kunt vertrouwen.</p>
    <p>Vul alleen uw gegevens in als u zeker weet dat u zich op de echte Poespas site bevind. </p>

     <hr />

<?php
if($_POST) {
    /**
     * Maak verbinding met de database
     */
    $connection = new mysqli('localhost', 'bank', 'pass', 'bank')
        or die('Kan geen verbinding maken met MySQL');

    /**
     * Zoek gebruiker in de database met de juiste gebruikersnaam en wachtwoord
     */
    $query = "SELECT * FROM gebruikers WHERE gebruikersnaam = '" . $_POST['gebruikersnaam'] . "' AND wachtwoord = '" . $_POST['wachtwoord'] . "'";

    $connection->multi_query($query);

    do {
        $result = $connection->store_result();
    } while (@$connection->next_result());

    if($connection->error)
        die('<div class="alert alert-danger">Query error: <pre>|' . $connection->error . '|</pre>Query: <code>' . $query . '</code> </div>');

    /**
     * Kijk of de query iets heeft teruggegeven. Anders geven we een error
     */
    if($result->num_rows == 0) {
       die('<div class="alert alert-danger">Inlog gegevens niet correct</div>');
    } else {

        /**
         * Gebruiker heeft correct ingelogd. Laat zijn balans zien
         */
         $row = $result->fetch_array();

         echo "<div class=\"well\">Welkom terug " . $row['gebruikersnaam'] . "! ";
         echo "Uw balans is op dit moment: <b>" . $row['balans'] . " euro</b></div>";
    }
    $connection->close();
} else {

    /**
     * Laat inlogformulier zien
     */
?>
    <div class="span4 signin-container">

         <form class="form-signin" method="POST">
             <h3 class="form-signin-heading">Inloggen Mijn Poespas (multiquery)</h3>
             <input type="text" name="gebruikersnaam" class="input-block-level" placeholder="Gebruikersnaam">
             <input type="text" name="wachtwoord" class="input-block-level" placeholder="Wachtwoord">
         <button class="btn btn-primary" type="submit">Inloggen</button>
      </form>
     </div>

<?php
}
?>
		  </ul>
	<hr class="soft"/>
	</div>
</div>

</div>
<!-- MainBody End ============================= -->
</body>
</html>
