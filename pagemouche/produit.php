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
    <title>Mouches Gladiator</title>
    <link rel="website icon" type="png" href="../img/png/mouchegladiator/large.png">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/produit.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
</head>

<body>
<header>
    <nav>
        <div class="nav-container">
            <a href="../index.php" class="logo">
                <img src="../img/logo.svg" alt="Logo Mouches de Combat">
            </a>
            <div class="burger">
                <div></div>
                <div></div>
                <div></div>
            </div>
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
        <!-- Image du produit -->
        <div class="product-image">
            <img id="product-image" src="../img/png/mouchegladiator/large.png" alt="Mouche Gladiator">
        </div>
        <!-- Détails et formulaire -->
        <div class="product-info">
            <h2>Mouche Gladiator</h2>
            <p>Cette mouche est un combattant redoutable, alliant robustesse et rapidité. Sa construction soignée lui permet de dominer l’arène avec agilité et précision, résistant aux conditions extrêmes pour affronter ses adversaires avec une détermination inébranlable.</p>
            <p><strong id="price">Prix : 50 - 150 flies</strong></p>

            <form action="produit.php" method="post">
                <input type="hidden" name="product_name" value="mouchetorndo">
                <input type="hidden" name="product_price" id="product_price" value="100">
                <input type="hidden" name="product_image" id="product_image" value="mouche_gladiator_small.svg">
                <input type="hidden" name="size" id="size" value="" required>

                <p><strong>Taille :</strong></p>
                <div class="size-options">
                    <button type="button" class="size-button" data-size="small" onclick="selectSize('small')">Petite</button>
                    <button type="button" class="size-button" data-size="medium" onclick="selectSize('medium')">Moyenne</button>
                    <button type="button" class="size-button" data-size="large" onclick="selectSize('large')">Grande</button>
                </div>

                <button type="submit" class="add-to-cart-button" id="add-to-cart" disabled>Ajouter au Panier</button>
            </form>
        </div>
    </div>
</main>

<section class="black-section">
    <div class="stats">
        <h2>Information</h2>
        <h3>résistance</h3>
        <p class="etoiles">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
        <p class="description">La mouche <strong>gladiator</strong> a 4 étoiles de résistance quand elle possède un casque en or, sinon cela peut descendre à 3,5 étoiles.</p>
        <h3>endurance</h3>
        <p class="etoiles">&#9733; &#9733; &#9734; &#9734; &#9734;</p>
        <p class="description">La mouche <strong>gladiator</strong> a 2 étoiles d'endurance car son casque va venir l'alourdir et donc la mettre en difficulté.</p>
        <h3>force</h3>
        <p class="etoiles">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
        <p class="description">La mouche <strong>gladiator</strong> a 4 étoiles de force, grâce à cela elle peut facilement gagner des combats.</p>
    </div>
    </section>

<footer>
    <nav>
        <ul>
            <p>&copy; 2024 Mouches de Combat</p>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="mentions-legales.php">Mentions légales</a></li>
        </ul>
    </nav>
</footer>

<script>
    function selectSize(size) {
        // Mettre à jour le champ caché pour la taille
        document.getElementById("size").value = size;

        // Mettre à jour le prix et l'image selon la taille sélectionnée
        var priceElement = document.getElementById("price");
        var imageElement = document.getElementById("product-image");
        var productPrice = document.getElementById("product_price");
        var productImage = document.getElementById("product_image");

        if (size === "small") {
            priceElement.innerText = "Prix : 50 flies";
            imageElement.src = "../img/png/mouchegladiator/small.png";
            productPrice.value = "50";
            productImage.value = "mouche_gladiator_small.svg";
        } else if (size === "medium") {
            priceElement.innerText = "Prix : 100 flies";
            imageElement.src = "../img/png/mouchegladiator/medium.png";
            productPrice.value = "100";
            productImage.value = "mouche_gladiator_medium.svg";
        } else if (size === "large") {
            priceElement.innerText = "Prix : 150 flies";
            imageElement.src = "../img/png/mouchegladiator/large.png";
            productPrice.value = "150";
            productImage.value = "mouche_gladiator_large.svg";
        }

        // Activer le bouton "Ajouter au Panier"
        document.getElementById("add-to-cart").disabled = false;

        // Mettre en surbrillance le bouton sélectionné
        document.querySelectorAll(".size-button").forEach(button => {
            button.classList.remove("selected");
        });
        document.querySelector(`.size-button[data-size="${size}"]`).classList.add("selected");
    }
</script>
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
