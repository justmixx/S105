<?php
// Fonction pour vider le panier
if (isset($_POST['clear_cart'])) {
    $cart_file = 'cart.csv';
    $handle = fopen($cart_file, 'w'); // Vider le fichier
    fclose($handle);
    $message = "Le panier a été vidé avec succès.";
}

// Fonction pour supprimer un produit individuel
if (isset($_POST['remove_item'])) {
    $item_index = $_POST['item_index'];
    $cart_file = 'cart.csv';
    $updated_cart = [];

    if (($handle = fopen($cart_file, 'r')) !== FALSE) {
        $current_index = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($current_index != $item_index) {
                $updated_cart[] = $data; // Garder les produits sauf celui à supprimer
            }
            $current_index++;
        }
        fclose($handle);
    }

    // Réécrire le fichier CSV avec les produits restants
    $handle = fopen($cart_file, 'w');
    foreach ($updated_cart as $item) {
        fputcsv($handle, $item);
    }
    fclose($handle);
    $message = "Le produit a été supprimé avec succès.";
}

// Fonction pour mettre à jour la quantité d'un produit
if (isset($_POST['update_quantity'])) {
    $item_index = $_POST['item_index'];
    $quantity_change = (int)$_POST['quantity_change'];
    $cart_file = 'cart.csv';
    $updated_cart = [];

    if (($handle = fopen($cart_file, 'r')) !== FALSE) {
        $current_index = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($current_index == $item_index) {
                // Mettre à jour la quantité (au moins 1)
                $data[4] = max(1, $data[4] + $quantity_change);
            }
            $updated_cart[] = $data;
            $current_index++;
        }
        fclose($handle);
    }

    // Réécrire le fichier CSV avec les nouvelles quantités
    $handle = fopen($cart_file, 'w');
    foreach ($updated_cart as $item) {
        fputcsv($handle, $item);
    }
    fclose($handle);
    $message = "La quantité a été mise à jour avec succès.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/panier.css">
</head>
<body>
    <header>
        <?php include('include/header.php'); ?>
    </header>
    <h1>Votre Panier</h1>

    <?php
    $cart_file = 'cart.csv';
    $total_price = 0; // Initialiser le total à 0

    // Vérifier si le fichier panier existe et n'est pas vide
    if (file_exists($cart_file) && filesize($cart_file) > 0) {
        echo "
                <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Taille</th>
                        <th>Prix Unitaire</th>
                        <th>Quantité</th>
                        <th>Sous-total</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";

        // Lire le fichier CSV
        if (($handle = fopen($cart_file, 'r')) !== FALSE) {
            $index = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $price = (float) $data[2];
                $quantity = (int) $data[4];
                $subtotal = $price * $quantity; // Calculer le sous-total
                $total_price += $subtotal; // Ajouter au total

                echo "<tr>
                        <td>{$data[0]}</td>
                        <td>{$data[1]}</td>
                        <td>{$price} €</td>
                        <td>{$quantity}</td>
                        <td>{$subtotal} €</td>
                        <td><img src='{$data[3]}' alt='{$data[0]}' width='50'></td>
                        <td>
                            <form method='post' style='display: inline;'>
                                <input type='hidden' name='item_index' value='{$index}'>
                                <input type='hidden' name='quantity_change' value='1'>
                                <button type='submit' name='update_quantity'>+</button>
                            </form>
                            <form method='post' style='display: inline;'>
                                <input type='hidden' name='item_index' value='{$index}'>
                                <input type='hidden' name='quantity_change' value='-1'>
                                <button type='submit' name='update_quantity'>-</button>
                            </form>
                            <form method='post' style='display: inline;'>
                                <input type='hidden' name='item_index' value='{$index}'>
                                <button type='submit' name='remove_item'>Supprimer</button>
                            </form>
                        </td>
                    </tr>";
                $index++;
            }
            fclose($handle);
        }

        echo "</tbody>
            </table>";

        // Afficher le total du panier
        echo "<div style='text-align: right; margin-top: 10px;'>
                <strong>Total : {$total_price} €</strong>
              </div>";

        // Bouton pour vider le panier
        echo "<form method='post' style='text-align: right; margin-top: 10px;'>
                <button type='submit' name='clear_cart'>Vider le panier</button>
              </form>";
    } else {
        echo "<p>Votre panier est vide.</p>";
    }

    // Afficher un message de confirmation après une action
    if (isset($message)) {
        echo "<p style='color: green;'>$message</p>";
    }
    ?>
    <a href="index.php">Retour à la boutique</a>
</body>
</html>
