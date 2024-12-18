<?php
session_start();

// Suppression d'un produit du panier
if (isset($_POST['delete_index'])) {
    $index = (int) $_POST['delete_index'];
    if (isset($_SESSION['panier'][$index])) {
        unset($_SESSION['panier'][$index]);
        $_SESSION['panier'] = array_values($_SESSION['panier']); // Réindexer le tableau après la suppression
    }
}

// Calcul du total
$total = 0;
foreach ($_SESSION['panier'] as $produit) {
    $total += $produit['price'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier - Mouches de Combat</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/panier.css">
</head>

<body>
    <nav>
        <div class="nav-container">
            <a href="index.php" class="logo">
                <img src="img/logo.svg" alt="Logo Mouches de Combat">
            </a>
            <ul class="nav-links">
                <li><a href="catalogue.php">Catalogue</a></li>
                <li><a href="catalogue.php">Arène</a></li>
                <li><a href="#">Vendre</a></li>
                <li><a href="#">Notre laboratoire</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="cart-link">
                <a href="panier.php">Mon Panier</a>
            </div>
        </div>
    </nav>

    <main>
        <h1>Votre Panier</h1>
        <div class="cart-container">
            <?php if (empty($_SESSION['panier'])) : ?>
                <p>Votre panier est vide.</p>
            <?php else : ?>
                <ul class="cart-list">
                    <?php foreach ($_SESSION['panier'] as $index => $produit) : ?>
                        <li class="cart-item">
                            <img src="../img/<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['name']) ?>">
                            <div class="cart-item-info">
                                <h2><?= htmlspecialchars($produit['name']) ?></h2>
                                <p>Taille : <?= htmlspecialchars($produit['size']) ?></p>
                                <p>Prix : <?= htmlspecialchars($produit['price']) ?> MoucheCoins</p>
                            </div>
                            <!-- Formulaire de suppression -->
                            <form method="post" action="panier.php" style="display:inline;">
                                <input type="hidden" name="delete_index" value="<?= $index ?>">
                                <button type="submit" class="delete-button">Supprimer</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="cart-total">
                    <p>Total : <?= $total ?> MoucheCoins</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Mouches de Combat</p>
    </footer>
</body>

</html>
