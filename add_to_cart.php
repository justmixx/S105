<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $cart_file = 'cart.csv';

    $handle = fopen($cart_file, 'a');
    if ($handle !== FALSE) {
        fputcsv($handle, [$product, $size, $price, $image, 1]); // La cinquième colonne est pour la quantité
        fclose($handle);
        echo "Produit ajouté au panier avec succès ! <a href='panier.php'>Voir le panier</a>";
    } else {
        echo "Erreur : Impossible d'ajouter le produit au panier.";
    }
}
?>
