<?php

$connection = new mysqli('localhost', 'nieuws', 'pass', 'nieuws')
    or die('Kan geen verbinding maken met MySQL');

$connection->query("TRUNCATE commentaar");

?>
Alle reacties weggehaald.