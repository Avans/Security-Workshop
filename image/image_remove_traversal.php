<?php

// Remove '../' from the URL
$file = str_replace('../', '', $_GET['file']);

echo file_get_contents('../../'.$file);

?>