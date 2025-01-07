<?php
session_start();

// Initialiser le panier si nécessaire
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Ajouter un produit au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produit = [
        'id' => htmlspecialchars($_POST['id']),
        'name' => htmlspecialchars($_POST['product_name']),
        'price' => (float)$_POST['product_price'],
        'image' => htmlspecialchars($_POST['product_image']),
        'size' => htmlspecialchars($_POST['size']),
    ];
    $_SESSION['panier'][] = $produit;
}
?>
