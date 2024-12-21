<?php
session_start();

// Liste des produits
$products = [
    ['name' => 'Produit 1', 'price' => 50],
    ['name' => 'Produit 2', 'price' => 100],
    ['name' => 'Produit 3', 'price' => 150],
    ['name' => 'Produit 4', 'price' => 200],
    ['name' => 'Produit 5', 'price' => 250],
];

// Récupérer le prix maximum depuis la requête GET
$max_price = isset($_GET['max_price']) ? (float) $_GET['max_price'] : null;

// Filtrer les produits selon le prix maximum
$filtered_products = $max_price ? array_filter($products, function ($product) use ($max_price) {
    return $product['price'] <= $max_price;
}) : $products;
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Mouches de Combat</title>
    <link rel="stylesheet" href="css/catalogues.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="website icon" type="svg" href="img/logo.svg">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
</head>

<body>
    <header>
        <nav>
            <div class="nav-container">
                <a href="index.php" class="logo">
                    <img src="img/logo.svg" alt="Logo Mouches de Combat">
                </a>
                <div class="burger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <ul class="nav-links">
                    <li><a href="catalogue.php">Catalogue</a></li>
                    <li><a href="arene.php">Arène</a></li>
                    <li><a href="vendre.php">Vendre</a></li>
                    <li><a href="laboratoire.php">Notre laboratoire</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <div class="cart-link">
                    <a href="panier.php">
                        <span class="material-symbols-outlined">shopping_cart</span>
                        mon panier
                    </a>
                </div>
            </div>
        </nav>
    </header>

<body>
    <div class="titre">
        <h1>Catalogue</h1>
    </div>
    <div class="container">
        <!-- Filtre -->
        <div class="filter">
            <h3>Filtrer par prix</h3>
            <form method="GET" action="catalogue.php">
                <div class="price-range">
                    <label for="max_price">Prix maximum :</label>
                    <input type="range" id="max_price" name="max_price" min="0" max="300" step="10" 
                        value="<?= htmlspecialchars($max_price ?? 300) ?>" oninput="this.nextElementSibling.value = this.value">
                    <output><?= htmlspecialchars($max_price ?? 300) ?></output>
                </div>
                <button type="submit">Appliquer</button>
            </form>
        </div>

        <!-- Produits -->
        <div class="products">
            <?php if (!empty($filtered_products)): ?>
                <?php foreach ($filtered_products as $product): ?>
                    <div class="product">
                        <h4><?= htmlspecialchars($product['name']) ?></h4>
                        <p>Prix : <?= htmlspecialchars($product['price']) ?> €</p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun produit ne correspond à votre recherche.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
