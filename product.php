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
                $etoile1 = $data[8];
                $description1 = $data[9];
                $etoile2 = $data[10];
                $description2 = $data[11];
                $etoile3 = $data[12];
                $description3 = $data[13];
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title><?= $data[0]; ?></title>
                    <link rel="stylesheet" href="css/styles.css">
                    <link rel="stylesheet" href="css/produit.css">
                    <header>
                    <?php include('include/header.php');?>
                    </header>
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
                    <div class="product-details">
                        <!-- Image du produit -->
                        <div class="product-image">
                            <img id="product-image" src="<?= $sizes['small']['image']; ?>" alt="<?= $data[0]; ?>">
                        </div>
                            <div class="product-info">
                                <h2 class="title"><?= $data[0]; ?></h2>
                                <p>Description : <?= $description; ?></p>
                                <p>Prix : <span id="product-price"><?= $sizes['small']['price']; ?> €</span></p>
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
                                    <button type="submit" class="add-to-cart-button" id="add-to-cart">Ajouter au panier</button>
                                </form>
                            </div>
                        </div>
                        
                        <section class="black-section">
                        <h2>Information</h2>
                        <div class="stats">
                            <div class="info">
                                <h3>Résistance</h3>
                                <p class="etoiles"><?= $etoile1; ?></p>
                                <p class="description"><?= $description1; ?></p>
                            </div>
                            <div class="info">
                                <h3>Endurance</h3>
                                <p class="etoiles"><?= $etoile2; ?></p>
                                <p class="description"><?= $description2; ?></p>
                            </div>
                            <div class="info">
                                <h3>Force</h3>
                                <p class="etoiles"><?= $etoile3; ?></p>
                                <p class="description"><?= $description3; ?></p>
                            </div>
                        </div>
                    </section>
                    <footer>
                        <?php include('include/footer.php');?>
                    </footer>

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
