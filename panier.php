<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'increment') {
        foreach ($_SESSION['panier'] as &$item) {
            if ($item['name'] === $_POST['product_name'] && $item['size'] === $_POST['size']) {
                $item['quantity']++;
            }
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'decrement') {
        foreach ($_SESSION['panier'] as &$item) {
            if ($item['name'] === $_POST['product_name'] && $item['size'] === $_POST['size']) {
                $item['quantity'] = max(1, $item['quantity'] - 1);
            }
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'remove') {
        $_SESSION['panier'] = array_filter($_SESSION['panier'], function ($item) {
            return !($item['name'] === $_POST['product_name'] && $item['size'] === $_POST['size']);
        });
    } elseif (isset($_POST['action']) && $_POST['action'] === 'clear') {
        $_SESSION['panier'] = [];
    }

    header('Location: panier.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>
<body>
    <h1><a href="index.php">panier</a></h1>

    <?php if (empty($_SESSION['panier'])): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Taille</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['panier'] as $item): ?>
                    <tr>
                        <td><img src="<?= htmlspecialchars($item['image']) ?>" alt="Produit" width="100"></td>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['size']) ?></td>
                        <td><?= htmlspecialchars($item['price']) ?> flies</td>
                        <td><?= htmlspecialchars($item['quantity']) ?></td>
                        <td><?= $item['price'] * $item['quantity'] ?> flies</td>
                        <td>
                            <form action="panier.php" method="post">
                                <input type="hidden" name="product_name" value="<?= htmlspecialchars($item['name']) ?>">
                                <input type="hidden" name="size" value="<?= htmlspecialchars($item['size']) ?>">
                                <button type="submit" name="action" value="increment">+</button>
                                <button type="submit" name="action" value="decrement">-</button>
                                <button type="submit" name="action" value="remove">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form action="panier.php" method="post">
            <button type="submit" name="action" value="clear">Vider le panier</button>
        </form>
    <?php endif; ?>
</body>
</html>
