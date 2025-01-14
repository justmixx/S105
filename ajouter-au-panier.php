<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = [
        'name' => $_POST['product_name'], // Nom du produit
        'price' => $_POST['product_price'], // Prix
        'image' => $_POST['product_image'], // Image
        'size' => $_POST['size'], // Taille
        'quantity' => 1, // Quantité initiale fixée à 1
    ];

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    $found = false;
    foreach ($_SESSION['panier'] as &$item) {
        if ($item['name'] === $product['name'] && $item['size'] === $product['size']) {
            $item['quantity']++; // Incrémenter la quantité si le produit existe déjà
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['panier'][] = $product; // Ajouter un nouvel article
    }

    header('Location: panier.php');
    exit;
}
?>
