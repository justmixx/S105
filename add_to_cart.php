<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $cart_file = 'cart.csv';

    // Ajouter les détails du produit au fichier CSV
    $handle = fopen($cart_file, 'a');
    fputcsv($handle, [$product, $size, $price, $image]);
    fclose($handle);

    echo "Produit ajouté au panier avec succès ! <a href='panier.php'>Voir le panier</a>";
}
?>
