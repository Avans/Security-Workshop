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

<?php
if(@$_SESSION['admin']) {
?>
<div class="alert alert-warning">
    Welkom terug administrator! De geheime code is: "Setec Astronomy".
</div>
<?php }?>

<div id="category">Algemeen / Binnenland</div>

<article>
    <div id="published">Gepubliceerd: 23 oktober 2012 06:35</div>
    <div id="update">Laatste update: 23 oktober 2012 06:35</div>

    <h1>Avans opnieuw beste hogeschool</h1>

    <h2 class="summary">LEIDEN - Hogeschool Avans in Noord-Brabant is opnieuw de beste grote hbo-instelling van Nederland.</h2>
  <img width="132" height="132" src="/themes/images/school.jpg" alt="">

    <p>Dat staat in de dinsdag verschenen <a target="_blank" href="http://www.keuzegids.org/hbovoltijd">Keuzegids Hbo Voltijd 2013</a>. Deze gids vergelijkt hogescholen op basis van statistieken over studiesucces, oordeel van deskundigen uit de accreditatie en het oordeel van studenten.</p>

    <p>Avans krijgt 71 punten, evenveel als vorig jaar. Ook de nummer 2 is onveranderd: Hogeschool Zeeland in Vlissingen. De NHTV in Breda is de nieuwe nummer 3. Hogeschool InHolland is net als vorig jaar de hekkensluiter van de lijst met 51 punten.</p>

    <p>Bij de middelgrote hogescholen met gemiddeld ongeveer 2000 studenten moet de Christelijke Hogeschool Ede (81 punten) voor het eerst in jaren de bovenste plaats afstaan aan een ander.</p>

    <p>De Gereformeerde Hogeschool uit Zwolle wordt met 85,5 punten beter beoordeeld. De Hotelschool Den Haag is een opvallende stijger, mede door een bijzonder gunstig deskundigenoordeel klommen zij van de tiende naar de vijfde plaats.</p><p>De hoogste scores zijn nog steeds te vinden bij de kleinste scholen. De Katholieke Pabo Zwolle en het IVA in Driebergen voeren al jaren de ranglijst aan met respectievelijk 92 en 88 punten. In de Keuzegids staat dat dat met name te danken is aan het feit dat zij slechts één hbo-opleiding aanbieden, die ook nog eens uitstekend verzorgd is. ''Eigen identiteit en - daardoor - een sterke binding met de studenten zijn belangrijke troeven",' zo valt te lezen in de gids.</p>

    <span class="smallprint">Door:&nbsp;ANP</span>
</article>

<div id="comments">
    <strong>Jouw reactie:</strong>
    <form method="POST">
    <textarea name="comment"></textarea><br />
    <button type="submit" name="addcomment">Reageer op dit bericht</button>
    </form>
<?php
    $result = $connection->query("SELECT * FROM commentaar ORDER BY id DESC")
      or die('Query error: ' . $connection->error);

    while ($row = $result->fetch_array()) {
    ?>

    <div class="comment">
      <div class="comment-header">
        door <span class="author"><?php echo $row['auteur']; ?></span>
      </div>
      <p><?php echo $row['bericht']; ?></p>
    </div>

    <?php
    }

    $connection->close();
    ?>

</div>

<hr>

<div id="admincheck">
    <a href="admincheck.php">Meld een probleem met deze website</a>
</div>
</section>
</body>
</html>
