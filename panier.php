<?php
$cart_file = 'cart.csv';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Gestion des actions sur le panier
    $action = $_POST['action'];
    $product_name = $_POST['product'];
    $size = $_POST['size'];

    // Lire le panier
    $cart = [];
    if (($handle = fopen($cart_file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $cart[] = $data;
        }
        fclose($handle);
    }

    // Modifier le panier
    foreach ($cart as &$item) {
        if ($item[0] == $product_name && $item[1] == $size) {
            if ($action === 'add') {
                $item[4] += 1; // Augmenter la quantité
            } elseif ($action === 'remove' && $item[4] > 1) {
                $item[4] -= 1; // Diminuer la quantité
            } elseif ($action === 'delete') {
                $item = null; // Supprimer le produit
            }
            break;
        }
    }

    // Supprimer les entrées nulles
    $cart = array_filter($cart);

    // Réécrire le fichier CSV
    $handle = fopen($cart_file, "w");
    foreach ($cart as $item) {
        fputcsv($handle, $item);
    }
    fclose($handle);
}

// Lire le panier pour affichage
$cart = [];
if (($handle = fopen($cart_file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $cart[] = $data;
    }
    fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Votre panier</h1>
    <?php if (empty($cart)): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Taille</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= $item[0]; ?></td>
                        <td><?= $item[1]; ?></td>
                        <td><?= $item[2]; ?> €</td>
                        <td><?= isset($item[4]) ? $item[4] : 1; ?></td>
                        <td><?= isset($item[2], $item[4]) ? number_format($item[2] * $item[4], 2) : '0.00'; ?> €</td>
                        <td>
                            <form action="panier.php" method="post" style="display:inline;">
                                <input type="hidden" name="product" value="<?= $item[0]; ?>">
                                <input type="hidden" name="size" value="<?= $item[1]; ?>">
                                <input type="hidden" name="action" value="add">
                                <button type="submit">+</button>
                            </form>
                            <form action="panier.php" method="post" style="display:inline;">
                                <input type="hidden" name="product" value="<?= $item[0]; ?>">
                                <input type="hidden" name="size" value="<?= $item[1]; ?>">
                                <input type="hidden" name="action" value="remove">
                                <button type="submit">-</button>
                            </form>
                            <form action="panier.php" method="post" style="display:inline;">
                                <input type="hidden" name="product" value="<?= $item[0]; ?>">
                                <input type="hidden" name="size" value="<?= $item[1]; ?>">
                                <input type="hidden" name="action" value="delete">
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>
            <strong>Total global : 
                <?php
                $total = array_reduce($cart, function ($sum, $item) {
                    return $sum + ($item[2] * $item[4]);
                }, 0);
                echo number_format($total, 2);
                ?> €
            </strong>
        </p>
    <?php endif; ?>
    <a href="index.php">Continuer vos achats</a>
</body>
</html>
