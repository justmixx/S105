<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bienvenue dans notre boutique</h1>
    <div class="product-list">
        <?php
        // Charger les produits depuis le CSV
        if (($handle = fopen("products.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                echo "
                <div class='product'>
                    <img src='{$data[2]}' alt='{$data[0]}'>
                    <h2>{$data[0]}</h2>
                    <p>Prix : {$data[1]} €</p>
                    <a href='product.php?name={$data[0]}'>Voir le produit</a>
                </div>";
            }
            fclose($handle);
        }
        ?>
    </div>
</body>
</html>