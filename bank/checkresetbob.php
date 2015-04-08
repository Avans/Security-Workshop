<?php
$connection = new mysqli('localhost', 'bank', 'pass', 'bank');
$result = $connection->query("SELECT * FROM gebruikers WHERE gebruikersnaam = 'Bob'");
$row = $result->fetch_array();
echo "Bob heeft: " . $row['balans'] . "<br>";

if ((int)$row['balans'] >= 10000) {
    echo "Bob is miljonair<br>";
}

echo "Updating back to 10.00<br>";

$connection->query("UPDATE gebruikers SET balans = 10.00 WHERE gebruikersnaam = 'Bob'");
$connection->close();


?>
