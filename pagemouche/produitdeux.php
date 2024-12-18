<?php
session_start();

// Initialisation du panier si nécessaire
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Ajout d'un produit au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'], $_POST['product_price'], $_POST['product_image'], $_POST['size'])) {
    $produit = [
        'name' => htmlspecialchars($_POST['product_name']),
        'price' => (float) $_POST['product_price'],
        'image' => htmlspecialchars($_POST['product_image']),
        'size' => htmlspecialchars($_POST['size'])
    ];
    $_SESSION['panier'][] = $produit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du produit - Mouches de Combat</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/produit.css">
</head>

<body>
    <nav>
        <div class="nav-container">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo.png" alt="Logo Mouches de Combat">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="catalogue.php">Catalogue</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="cart-link">
                <a href="../panier.php">Mon Panier</a>
            </div>
        </div>
    </nav>

    <main>
        <h1>Détails du produit</h1>
        
        <!-- Exemple de deux produits différents -->
        <div class="product-details">
            <!-- Image du produit 1 -->
            <div class="product-image">
                <img src="img/mouche_gladiator.jpg" alt="Mouche Gladiator">
            </div>
            <!-- Détails et formulaire -->
            <div class="product-info">
                <h2>Mouche Gladiator</h2>
                <p>Cette mouche est un véritable combattant ! Robuste et rapide, elle est prête à dominer l’arène.</p>
                <p><strong>Prix :</strong> 70 flies</p>
                <form action="produit.php" method="post">
                    <input type="hidden" name="product_name" value="Mouche DEUX">
                    <input type="hidden" name="product_price" value="70">
                    <input type="hidden" name="product_image" value="mouche_gladiator.jpg">

                    <label for="size">Taille :</label>
                    <select name="size" id="size" required>
                        <option value="" disabled selected>Choisissez une taille</option>
                        <option value="small">Petite</option>
                        <option value="medium">Moyenne</option>
                        <option value="large">Grande</option>
                    </select>

                    <button type="submit" class="add-to-cart-button">Ajouter au Panier</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Mouches de Combat</p>
        <nav>
            <ul>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="mentions-legales.php">Mentions légales</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>
