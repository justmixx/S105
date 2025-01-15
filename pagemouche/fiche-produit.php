<?php
session_start();

// Charger les produits depuis le CSV
$products = [];
if (($handle = fopen("products.csv", "r")) !== FALSE) {
    $headers = fgetcsv($handle, 1000, ","); // Lire les en-têtes
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $products[] = array_combine($headers, $data); // Associer les en-têtes aux valeurs
    }
    fclose($handle);
}

// Récupérer le produit via le paramètre GET
$product_name = isset($_GET['product_name']) ? htmlspecialchars($_GET['product_name']) : '';
$product = null;
foreach ($products as $prod) {
    if ($prod['name'] === $product_name) {
        $product = $prod;
        break;
    }
}

// Si le produit n'est pas trouvé, rediriger vers le catalogue
if (!$product) {
    header("Location: catalogue.php");
    exit;
}

// Initialiser le panier si nécessaire
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Ajouter un produit au panier
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
    <title><?= htmlspecialchars($product['name']); ?> - Mouches Gladiator</title>
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
                <a href="../panier.php">Mon Panier</a>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="product-details">
        <!-- Image du produit -->
        <div class="product-image">
            <img id="product-image" src="../<?= htmlspecialchars($product['image_medium']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
        </div>
        <!-- Détails et formulaire -->
        <div class="product-info">
            <h2><?= htmlspecialchars($product['name']); ?></h2>
            <p><?= htmlspecialchars($product['description']); ?></p>
            <p><strong id="price">Prix : <?= htmlspecialchars($product['price_medium']); ?> flies</strong></p>

            <form action="product.php?product_name=<?= urlencode($product['name']); ?>" method="post">
                <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']); ?>">
                <input type="hidden" name="product_price" id="product_price" value="<?= htmlspecialchars($product['price_medium']); ?>">
                <input type="hidden" name="product_image" id="product_image" value="<?= htmlspecialchars($product['image_medium']); ?>">
                <input type="hidden" name="size" id="size" value="medium">

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
        const prices = {
            small: <?= htmlspecialchars($product['price_small']); ?>,
            medium: <?= htmlspecialchars($product['price_medium']); ?>,
            large: <?= htmlspecialchars($product['price_large']); ?>
        };

        const images = {
            small: "../<?= htmlspecialchars($product['image_small']); ?>",
            medium: "../<?= htmlspecialchars($product['image_medium']); ?>",
            large: "../<?= htmlspecialchars($product['image_large']); ?>"
        };

        document.getElementById("price").innerText = "Prix : " + prices[size] + " flies";
        document.getElementById("product-image").src = images[size];
        document.getElementById("product_price").value = prices[size];
        document.getElementById("product_image").value = images[size];
        document.getElementById("size").value = size;
        document.getElementById("add-to-cart").disabled = false;

        document.querySelectorAll(".size-button").forEach(button => {
            button.classList.remove("selected");
        });
        document.querySelector(`.size-button[data-size="${size}"]`).classList.add("selected");
    }
</script>
</body>
</html>