<?php
$file = 'panier.csv';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (file_exists($file)) {
        file_put_contents($file, ''); // Écrase le fichier avec une chaîne vide
    }
}

header('Location: panier.php');
exit;
?>
