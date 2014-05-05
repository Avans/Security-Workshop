<?php

// Controleer of de string begint met 'uploads'
if(substr($_GET['file'], 0, 7) == 'uploads') {
    echo file_get_contents('../../' . $_GET['file']);
} else {
    echo "Bestand moet in uploads map staan!";
}

?>