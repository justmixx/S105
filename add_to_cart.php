<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    
    // Associer une image spécifique en fonction de la taille
    $images = [
        'small' => 'images/small.jpg',
        'medium' => 'images/medium.jpg',
        'large' => 'images/large.jpg',
    ];
    $image = $images[$size];

    // Ajouter au fichier CSV
    $cart_file = fopen("cart.csv", "a");
    fputcsv($cart_file, [$product, $price, $size, $image]);
    fclose($cart_file);

    echo "Produit ajouté au panier avec succès ! <a href='index.php'>Retour à la boutique</a>";
}
?>
