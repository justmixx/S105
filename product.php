<?php
if (isset($_GET['name'])) {
    $product_name = $_GET['name'];
    if (($handle = fopen("products.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($data[0] == $product_name) {
                // Définir les données spécifiques pour chaque taille
                $sizes = [
                    "small" => ["price" => $data[1], "image" => $data[4]],
                    "medium" => ["price" => $data[2], "image" => $data[5]],
                    "large" => ["price" => $data[3], "image" => $data[6]],
                ];

                // Description du produit
                $description = $data[7];
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title><?= $data[0]; ?></title>
                    <link rel="stylesheet" href="style.css">
                    <script>
                        // Fonction pour changer l'image et le prix en fonction de la taille
                        function updateProductDetails(size) {
                            const sizes = <?= json_encode($sizes); ?>;
                            const priceElement = document.getElementById('product-price');
                            const imageElement = document.getElementById('product-image');
                            priceElement.textContent = sizes[size].price + " €";
                            imageElement.src = sizes[size].image;

                            // Mise à jour des champs cachés dans le formulaire
                            document.getElementById('hidden-price').value = sizes[size].price;
                            document.getElementById('hidden-image').value = sizes[size].image;
                        }
                    </script>
                </head>
                <body>
                    <h1><?= $data[0]; ?></h1>
                    <img id="product-image" src="<?= $sizes['small']['image']; ?>" alt="<?= $data[0]; ?>" width="300">
                    <p>Prix : <span id="product-price"><?= $sizes['small']['price']; ?> €</span></p>
                    <p>Description : <?= $description; ?></p>
                    <form action="add_to_cart.php" method="post">
                        <input type="hidden" name="product" value="<?= $data[0]; ?>">
                        <input type="hidden" name="price" id="hidden-price" value="<?= $sizes['small']['price']; ?>">
                        <input type="hidden" name="image" id="hidden-image" value="<?= $sizes['small']['image']; ?>">
                        <label for="size">Choisissez une taille :</label>
                        <select name="size" id="size" onchange="updateProductDetails(this.value)">
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                        <button type="submit">Ajouter au panier</button>
                    </form>
                    <a href="index.php">Retour à la boutique</a>
                </body>
                </html>
                <?php
                exit; // Arrêter l'exécution après avoir trouvé le produit
            }
        }
        fclose($handle);
    }
}
?>
