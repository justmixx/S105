<?php
// Fonction pour vider le panier
if (isset($_POST['clear_cart'])) {
    $cart_file = 'cart.csv';
    // Ouvrir le fichier en mode écriture pour le vider
    $handle = fopen($cart_file, 'w');
    fclose($handle);
    $message = "Le panier a été vidé avec succès.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Votre Panier</h1>

    <?php
    $cart_file = 'cart.csv';

    // Vérifier si le fichier panier existe et n'est pas vide
    if (file_exists($cart_file) && filesize($cart_file) > 0) {
        echo "<table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Taille</th>
                        <th>Prix</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>";

        // Lire le fichier CSV
        if (($handle = fopen($cart_file, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                echo "<tr>
                        <td>{$data[0]}</td>
                        <td>{$data[2]}</td>
                        <td>{$data[1]} €</td>
                        <td><img src='{$data[3]}' alt='{$data[0]}' width='50'></td>
                    </tr>";
            }
            fclose($handle);
        }

        echo "</tbody>
            </table>";

        // Bouton pour vider le panier
        echo "<form method='post'>
                <button type='submit' name='clear_cart'>Vider le panier</button>
              </form>";
    } else {
        echo "<p>Votre panier est vide.</p>";
    }

    // Afficher un message de confirmation après avoir vidé le panier
    if (isset($message)) {
        echo "<p style='color: green;'>$message</p>";
    }
    ?>
    <a href="index.php">Retour à la boutique</a>
</body>
</html>
