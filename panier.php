<?php
// Fonction pour vider le panier
if (isset($_POST['clear_cart'])) {
    $cart_file = 'cart.csv';
    file_put_contents($cart_file, ""); // Vider le fichier
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
                // Mettre à jour la quantité (minimum 1)
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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - Mouches de Combat</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/panier.css">
    <link rel="website icon" href="img/logo.svg">
</head>
<body>
    <header>
        <?php include('include/header.php'); ?>
    </header>
    <main>
        <h1>Votre Panier</h1>
        <?php
        $cart_file = 'cart.csv';
        $total_price = 0; // Initialiser le total à 0

        // Vérifier si le fichier panier existe et n'est pas vide
        if (file_exists($cart_file) && filesize($cart_file) > 0) {
            echo "<div class='cart-container'>";

            // Lire le fichier CSV
            if (($handle = fopen($cart_file, 'r')) !== FALSE) {
                $index = 0;
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $price = (float)$data[2];
                    $quantity = (int)$data[4];
                    $subtotal = $price * $quantity; // Calculer le sous-total
                    $total_price += $subtotal; // Ajouter au total

                    echo "
                        <div class='cart-item'>
                            <div class='product-info'>
                                <img src='{$data[3]}' alt='{$data[0]}' class='product-image'>
                                <span class='product-name'>{$data[0]}</span>
                            </div>
                            <div class='product-details'>
                                <span class='product-size'>{$data[1]}</span>
                                <span class='product-price'>{$price} €</span>
                                <div class='quantity-controls'>
                                    <form method='post' style='display: inline;'>
                                        <input type='hidden' name='item_index' value='{$index}'>
                                        <input type='hidden' name='quantity_change' value='1'>
                                        <button type='submit' name='update_quantity' class='quantity-increase'>+</button>
                                    </form>
                                    <!-- Affichage de la quantité -->
                                    <span class='product-quantity'>{$quantity}</span>
                                    <form method='post' style='display: inline;'>
                                        <input type='hidden' name='item_index' value='{$index}'>
                                        <input type='hidden' name='quantity_change' value='-1'>
                                        <button type='submit' name='update_quantity' class='quantity-decrease'>-</button>
                                    </form>
                                </div>
                                <span class='product-subtotal'>{$subtotal} €</span>
                            </div>
                            <div class='product-actions'>
                                <form method='post'>
                                    <input type='hidden' name='item_index' value='{$index}'>
                                    <button type='submit' name='remove_item' class='remove-item'>Supprimer</button>
                                </form>
                            </div>
                        </div>
                        ";
                    $index++;
                }
                fclose($handle);
            }

            // Afficher le total du panier
            echo "
                <div class='cart-total'>
                    <strong>Total : {$total_price} €</strong>
                </div>";

            // Bouton pour vider le panier
            echo "
                <form method='post' class='clear-cart-form'>
                    <button type='submit' name='clear_cart' class='clear-cart-button'>Vider le panier</button>
                </form>
                <form class='clear-cart-form'>
                    <button class='clear-cart-button'>Passez commande</button>
                </form>";
            echo "</div>"; // Fermeture du conteneur principal
        } else {
            echo "<p>Votre panier est vide.</p>";
        }

        // Afficher un message de confirmation après une action
        if (isset($message)) {
            echo "<p class='message'>$message</p>";
        }
        ?>
    </main>

    
    <footer>
        <?php include('include/footer.php');?>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const burger = document.querySelector('.burger');
            const navLinks = document.querySelector('.nav-links');

            burger.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
