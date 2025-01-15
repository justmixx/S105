<?php
if (isset($_GET['name'])) {
    $product_name = $_GET['name'];
    if (($handle = fopen("products.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($data[0] == $product_name) {
                echo "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <title>{$data[0]}</title>
                    <link rel='stylesheet' href='style.css'>
                </head>
                <body>
                    <h1>{$data[0]}</h1>
                    <img src='{$data[2]}' alt='{$data[0]}' width='300'>
                    <p>Prix : {$data[1]} €</p>
                    <form action='add_to_cart.php' method='post'>
                        <input type='hidden' name='product' value='{$data[0]}'>
                        <input type='hidden' name='price' value='{$data[1]}'>
                        <label for='size'>Choisissez une taille :</label>
                        <select name='size' id='size'>
                            <option value='small'>Small</option>
                            <option value='medium'>Medium</option>
                            <option value='large'>Large</option>
                        </select>
                        <button type='submit'>Ajouter au panier</button>
                    </form>
                </body>
                </html>";
            }
        }
        fclose($handle);
    }
}
?>
