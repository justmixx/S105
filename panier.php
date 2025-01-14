<?php
$file = 'panier.csv';
$panier = [];

// Lecture des données du fichier CSV
if (file_exists($file)) {
    $handle = fopen($file, 'r');
    while (($data = fgetcsv($handle)) !== false) {
        $panier[] = [
            'name' => $data[0],
            'price' => $data[1],
            'image' => $data[2],
            'size' => $data[3]
        ];
    }
    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="logo">
                <img src="img/logo.svg" alt="Logo Mouches de Combat">
            </a>
        </nav>
    </header>

    <main>
        <h1>Votre Panier</h1>

        <?php if (empty($panier)): ?>
            <p>Votre panier est vide.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Taille</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($panier as $index => $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><?= htmlspecialchars($item['size']) ?></td>
                            <td><?= htmlspecialchars($item['price']) ?> flies</td>
                            <td>
                                <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="width: 50px; height: auto;">
                            </td>
                            <td>
                                <form action="remove_item.php" method="post">
                                    <input type="hidden" name="index" value="<?= $index ?>">
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p><strong>Total : 
                <?php
                $total = array_sum(array_column($panier, 'price'));
                echo $total;
                ?> flies
            </strong></p>

            <form action="clear_cart.php" method="post">
                <button type="submit">Vider le panier</button>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>
