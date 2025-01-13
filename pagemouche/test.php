<?php
session_start();

// Initialisation du panier si nécessaire
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Ajout d'un produit au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'], $_POST['product_price'], $_POST['product_image'], $_POST['size'])) {
    $produit = [
        'nom' => htmlspecialchars($_POST['product_name']),
        'prix' => (float) $_POST['product_price'],
        'image' => htmlspecialchars($_POST['product_image']),
        'taille' => htmlspecialchars($_POST['size'])
    ];

    // Ajouter le produit au panier
    $_SESSION['panier'][] = $produit;

    // Rediriger vers le panier
    header('Location: panier.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouche Gladiator</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/produit.css">
</head>

<body>
    <header>
        <nav>
            <a href="../index.php" class="logo">
                <img src="../img/logo.svg" alt="Logo Mouches de Combat">
            </a>
        </nav>
    </header>

    <main>
        <div class="product-details">
            <div class="product-image">
                <img id="product-image" src="../img/png/mouchegladiator/large.png" alt="Mouche Gladiator">
            </div>
            <div class="product-info">
                <h2>Mouche Gladiator</h2>
                <p>Cette mouche est un combattant redoutable, alliant robustesse et rapidité...</p>
                <p><strong id="price">Prix : 50 - 150 flies</strong></p>

                <form action="mouchegladiator.php" method="post">
                    <input type="hidden" name="product_name" value="Mouche Gladiator">
                    <input type="hidden" name="product_price" id="product_price" value="200">
                    <input type="hidden" name="product_image" id="product_image" value="../img/png/mouchegladiator/large.png">
                    <input type="hidden" name="size" id="size" value="large">

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

    <script>
        function selectSize(size) {
            const priceElement = document.getElementById("price");
            const imageElement = document.getElementById("product-image");
            const productPrice = document.getElementById("product_price");
            const productImage = document.getElementById("product_image");

            if (size === "small") {
                priceElement.innerText = "Prix : 100 flies";
                imageElement.src = "../img/png/mouchegladiator/small.png";
                productPrice.value = "50";
                productImage.value = "../img/png/mouchegladiator/small.png";
            } else if (size === "medium") {
                priceElement.innerText = "Prix : 200 flies";
                imageElement.src = "../img/png/mouchegladiator/medium.png";
                productPrice.value = "100";
                productImage.value = "../img/png/mouchegladiator/medium.png";
            } else if (size === "large") {
                priceElement.innerText = "Prix : 300 flies";
                imageElement.src = "../img/png/mouchegladiator/large.png";
                productPrice.value = "150";
                productImage.value = "../img/png/mouchegladiator/large.png";
            }

            document.getElementById("add-to-cart").disabled = false;
            document.querySelectorAll(".size-button").forEach(button => {
                button.classList.remove("selected");
            });
            document.querySelector(`.size-button[data-size="${size}"]`).classList.add("selected");
        }
    </script>
</body>

</html>
