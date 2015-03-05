<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Wereldwiki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Paul Wagener">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

  <!-- De code in dit bestand is met opzet slecht en zeer onveilig opgezet.
       GEBRUIK DEZE CODE NIET als referentiemateriaal voor je eigen PHP projecten! -->

    <style>
    html, body {
        height: 100%;
    }
    .content {
        width: 70%;
        margin-top: 20px;
        text-align:center;
        background-image: url(/themes/images/world-map.png);
        background-repeat: no-repeat;
        background-position: 50% 80%;
        height: 100%;
    }
    </style>
  </head>

<body>

<div class="center-block content">
  <nav class="navbar navbar-default">
  <div class="navbar-header">
      <a class="navbar-brand" href="#">Wereldwijs</a>
    </div>
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="wiki.php?id=1">Frankrijk</a></li>
        <li><a href="wiki.php?id=2">Nederland</a></li>
        <li><a href="wiki.php?id=3">Duitsland</a></li>
      </ul>
    </div>
  </div>
</nav>

    <img src="/themes/images/world.png" style="width: 10%;">
    <p>Wereldwijs: Leer spelenderwijs over de politiek van de wereld</p>

<?php
$connection = new mysqli('localhost', 'wiki', 'pass', 'wiki')
    or die('Kan geen verbinding maken met MySQL');

$id = $_GET['id'];

$query = 'SELECT titel, tekst FROM paginas WHERE secret=0 AND id=' . $connection->real_escape_string($id);

$result = $connection->query($query)
  or die('<div class="alert alert-danger">Query error: <pre>' . $connection->error . '</pre>Query: <code>' . $query . '</code> </div>');

$row = $result->fetch_array();
if(!$row) {
    echo '<div class="alert alert-warning">Deze pagina bestaat niet, scheer je weg!</div>';
} else {
    echo "<h1>" . $row['titel'] . "</h1>";
    echo $row['tekst'];
}

$connection->close();
?>


    </div>

</body>
</html>
