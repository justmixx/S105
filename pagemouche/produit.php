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
    <title>mouches gladiator</title>
    <link rel="website icon" type="svg" href="../img/mouche_gladiator.svg">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/produit.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
    <script>
        function updateProductDetails() {
            var size = document.getElementById("size").value;
            var priceElement = document.getElementById("price");
            var imageElement = document.getElementById("product-image");

            // Modifier le prix et l'image selon la taille sélectionnée
            if (size === "small") {
                priceElement.innerText = "Prix : 50 flies";
                imageElement.src = "../img/png/mouchegladiator/small.png";  // Remplacez par l'image pour petite taille
                document.getElementById("product_price").value = "50";
                document.getElementById("product_image").value = "mouche_gladiator_small.svg";
            } else if (size === "medium") {
                priceElement.innerText = "Prix : 100 flies";
                imageElement.src = "../img/png/mouchegladiator/medium.png";  // Remplacez par l'image pour taille moyenne
                document.getElementById("product_price").value = "100";
                document.getElementById("product_image").value = "mouche_gladiator_medium.svg";
            } else if (size === "large") {
                priceElement.innerText = "Prix : 150 flies";
                imageElement.src = "../img/png/mouchegladiator/big.png";  // Remplacez par l'image pour grande taille
                document.getElementById("product_price").value = "150";
                document.getElementById("product_image").value = "mouche_gladiator_large.svg";
            }
        }
    </script>
</head>

<body>
<nav>
        <div class="nav-container">
                <a href="../index.php" class="logo">
                    <img src="../img/logo.svg" alt="Logo Mouches de Combat">
                </a>
            <ul class="nav-links">
                <li><a href="../catalogue.php">Catalogue</a></li>
                <li><a href="#arene">Arène</a></li>
                <li><a href="#">Vendre</a></li>
                <li><a href="#">Notre laboratoire</a></li>
                <li><a href="../contact.php">Contact</a></li>
            </ul>
            <div class="cart-link">
                <a href="../panier.php"><span class="material-symbols-outlined">
        shopping_cart
        </span>mon panier</a>
            </div>
        </div>
    </nav>

    <main>
        <h1>Détails du produit</h1>

        <div class="product-details">
            <!-- Image du produit -->
            <div class="product-image">
                <img id="product-image" src="../img/png/mouchegladiator/big.png" alt="Mouche Gladiator">
            </div>
            <!-- Détails et formulaire -->
            <div class="product-info">
                <h2>Mouche Gladiator</h2>
                <p>Cette mouche est un véritable combattant ! Robuste et rapide, elle est prête à dominer l’arène.</p>
                <p><strong id="price">Prix : 150 flies</strong></p>

                <form action="produit.php" method="post">
                    <input type="hidden" name="product_name" value="mouchegladiator">
                    <input type="hidden" name="product_price" id="product_price" value="50">
                    <input type="hidden" name="product_image" id="product_image" value="mouche_gladiator.svg">

                    <label for="size">Taille :</label>
                    <select name="size" id="size" required onchange="updateProductDetails()">
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
    
                <!-- responsive nav -->
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
