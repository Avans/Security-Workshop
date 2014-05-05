<?php
if($_FILES) {
    move_uploaded_file($_FILES["file"]["tmp_name"], "../../uploads/" . $_FILES["file"]["name"]);
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>imgr: the simple image sharer</title>

    <link rel="stylesheet" href="/themes/css/bootstrap.min.css" media="screen"/>
    <link rel="stylesheet" href="/themes/css/imgr.css" media="screen"/>

  <!-- De code in dit bestand is met opzet slecht en zeer onveilig opgezet.
       GEBRUIK DEZE CODE NIET als referentiemateriaal voor je eigen PHP projecten! -->
  </head>

  <body class="row-fluid">

    <div id="site-header">
      <img src="/themes/images/imgr.png" class="offset1">
      <a href="index_more_pages.php?include=login.php">Inloggen</a>
      <a href="index_more_pages.php?include=register.php">Registreren</a>
    </div>

    <div class="panel span6 offset1 images">
        <?php
        if(isset($_GET['include'])) {

            if(substr($_GET['include'], -4) == '.php') {
                include($_GET['include']);
            } else {
                echo 'Dit is geen PHP bestand';
            }

        } else {
            echo "<p>Wegens een security probleem in onze site kun je tijdelijk geen afbeeldingen bekijken.</p>";
        }
        ?>
    </div>

    <div class="panel span4">
      <form enctype="multipart/form-data" method="POST">
        <input type="file" name="file">
        <button type="submit">Upload afbeelding</button>
      </form>
    </div>

  </body>
</html>