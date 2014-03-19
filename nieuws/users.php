<table border="1">
  <tr>
    <th>Gebruikersnaam</th>
    <th>Wachtwoord</th>
  </tr>
<?php
$connection = new mysqli('localhost', 'nieuws', 'pass', 'nieuws')
    or die('Kan geen verbinding maken met MySQL');

$result = $connection->query("SELECT * FROM gebruikers");

while($row = $result->fetch_array()) {
    echo "<tr><td>{$row['gebruikersnaam']}</td><td>{$row['wachtwoord']}</td></tr>";
}

?>
</table>