<?php
$file = 'panier.csv';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = (int) $_POST['index'];

    if (file_exists($file)) {
        $panier = [];
        $handle = fopen($file, 'r');
        while (($data = fgetcsv($handle)) !== false) {
            $panier[] = $data;
        }
        fclose($handle);

        // Supprime l'élément à l'index donné
        if (isset($panier[$index])) {
            unset($panier[$index]);
            $panier = array_values($panier); // Réindexe les éléments

            $handle = fopen($file, 'w');
            foreach ($panier as $item) {
                fputcsv($handle, $item);
            }
            fclose($handle);
        }
    }
}

header('Location: panier.php');
exit;
?>
