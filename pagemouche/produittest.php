<?php
session_start();

// Initialisation du panier si nécessaire
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Ajout du produit au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'], $_POST['product_price'], $_POST['product_image'], $_POST['size'])) {
    $produit = [
        'name' => htmlspecialchars($_POST['product_name']),
        'price' => (float) $_POST['product_price'],
        'image' => htmlspecialchars($_POST['product_image']),
        'size' => htmlspecialchars($_POST['size']),
    ];
    $_SESSION['panier'][] = $produit;
    header('Location: ../panier.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouche Tornado</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/produit.css">
</head>
<body>
<header>
    <nav>
        <div class="nav-container">
            <a href="../index.php" class="logo">
                <img src="../img/logo.svg" alt="Logo Mouches de Combat">
            </a>
            <ul class="nav-links">
                <li><a href="../catalogue.php">Catalogue</a></li>
                <li><a href="../arene.php">Arène</a></li>
                <li><a href="../vendre.php">Vendre</a></li>
                <li><a href="../laboratoire.php">Notre laboratoire</a></li>
                <li><a href="../contact.php">Contact</a></li>
            </ul>
            <div class="cart-link">
                <a href="../panier.php">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    Mon Panier
                </a>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="product-details">
        <div class="product-image">
            <img id="product-image" src="../img/png/mouchegladiator/small.png" alt="Mouche Tornado">
        </div>
        <div class="product-info">
            <h2>Mouche Tornado</h2>
            <p>Description : Cette mouche allie puissance et vitesse, parfaite pour les combats intenses.</p>
            <p><strong id="price">Prix : 70 flies</strong></p>

            <form method="POST" action="produit_tornado.php">
                <input type="hidden" name="product_name" value="Mouche Tornado">
                <input type="hidden" name="product_price" id="product_price" value="70">
                <input type="hidden" name="product_image" id="product_image" value="../img/png/mouchetornado/small.png">
                <input type="hidden" name="size" id="size" value="small">

                <p><strong>Taille :</strong></p>
                <div class="size-options">
                    <button type="button" class="size-button" data-size="small" onclick="selectSize('small')">Petite</button>
                    <button type="button" class="size-button" data-size="medium" onclick="selectSize('medium')">Moyenne</button>
                    <button type="button" class="size-button" data-size="large" onclick="selectSize('large')">Grande</button>
                </div>

                <button type="submit" class="add-to-cart-button" id="add-to-cart">Ajouter au Panier</button>
            </form>
        </div>
    </div>
</main>

<script>
    function selectSize(size) {
        const priceElement = document.getElementById("price");
        const imageElement = document.getElementById("product-image");
        const priceInput = document.getElementById("product_price");
        const imageInput = document.getElementById("product_image");
        const sizeInput = document.getElementById("size");

        if (size === "small") {
            priceElement.innerText = "Prix : 70 flies";
            imageElement.src = "../img/png/mouchegladiator/small.png";
            priceInput.value = "70";
            imageInput.value = "../img/png/mouchegladiator/small.png";
        } else if (size === "medium") {
            priceElement.innerText = "Prix : 100 flies";
            imageElement.src = "../img/png/mouchegladiator/medium.png";
            priceInput.value = "100";
            imageInput.value = "../img/png/mouchegladiator/medium.png";
        } else if (size === "large") {
            priceElement.innerText = "Prix : 150 flies";
            imageElement.src = "../img/png/mouchegladiator/large.png";
            priceInput.value = "150";
            imageInput.value = "../img/png/mouchegladiator/large.png";
        }

        sizeInput.value = size;
    }
</script>
</body>
</html>
