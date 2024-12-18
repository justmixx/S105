<?php
session_start();

// Initialisation du panier si nécessaire
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'], $_POST['product_price'], $_POST['size'])) {
    $produit = [
        'name' => htmlspecialchars($_POST['product_name']),
        'price' => (float) $_POST['product_price'],
        'size' => htmlspecialchars($_POST['size']),
    ];
    // Ajouter le produit au panier
    $_SESSION['panier'][] = $produit;
    // Redirection vers le panier (ou autre page)
    header('Location: panier.php');
    exit;
} else {
    // Redirection si accès direct à ce fichier
    header('Location: catalogue.php');
    exit;
}
?>
