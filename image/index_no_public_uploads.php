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
    </div>

    <div class="panel span6 offset1 images">
        <div class="header">De <em>meest recente</em> plaatjes van vandaag:</div>
        <?php
        foreach ( glob('../../uploads/*') as $image ) {
            $image = 'image.php?file=uploads/' . basename($image);
            echo '<a href="'.$image.'"><img src="'.$image.'"></a>';
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