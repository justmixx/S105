<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue - Mouches de Combat</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/catalogues.css">
    <link rel="website icon" type="svg" href="img/logo.svg">
</head>

<body>
    <header>
        <?php include('include/header.php');?>
    </header>


<main class="catalogue">

    <h1>Découvrez nos mouches</h1> 
    <div class="nav-catalogue">
        <ul>
            <li><a class="button" href="#un">Dernières espèces</a></li>
            <li><a class="button" href="#deux">Nos incontournables</a></li>
        </ul>
    </div>
     <?php
// Charger les produits depuis le CSV
if (($handle = fopen("products.csv", "r")) !== FALSE) {
    // Lire uniquement la première ligne
    if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        echo "
        <div class='premier'>
             <a href='product.php?name={$data[0]}' class='box-img'>
           <img src='{$data[4]}' alt='{$data[0]}'>
            </a>
            <div class='box-texte'>
                <h2>NOUVEAU</h2>
                <h3>{$data[0]}</h3>
                <p>{$data[7]}</p>
            <a href='product.php?name={$data[0]}' class='button'>{$data[1]}€</a>
            </div>
        </div>";
        }
        fclose($handle);
    }
    ?>
    </div>
    <h2 id="un" class="center"> Nos dernières espèces </h2>
    <div class="container">
    <?php
// Charger les produits depuis le CSV
if (($handle = fopen("products.csv", "r")) !== FALSE) {
    // Lire et ignorer la première ligne (en-têtes)
    fgetcsv($handle);

    $counter = 0; // Initialiser un compteur

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        echo "
        <a class='article' href='product.php?name={$data[0]}'>
            <div class='box-img'>
                <img src='{$data[4]}' alt='{$data[0]}'>
            </div>
            <div class='box-texte'>
                <h3>{$data[0]}</h3>
                <p>{$data[15]}</p>
                <p class='prix'>{$data[1]} / {$data[2]} / {$data[3]} €</p>
            </div>
        </a>";
        
        $counter++; // Incrémenter le compteur
        if ($counter >= 3) { // Arrêter après 3 articles
            break;
        }
    }
    fclose($handle);
}
?>

    </div>
    <h2 id="deux" class="center"> Nos incontournables </h2>
    <div class="container">
    <?php
        // Charger les produits depuis le CSV
        if (($handle = fopen("products.csv", "r")) !== FALSE) {
             // Lire et ignorer la première ligne (en-têtes)
             for ($i = 1; $i <= 4; $i++) {
                (fgetcsv($handle));
             }

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                echo "
                <a class='article' href='product.php?name={$data[0]}'>
                    <div class='box-img'>
                    <img src='{$data[4]}' alt='{$data[0]}'>
                    </div>
                    <div class='box-texte'>
                        <h3>{$data[0]}</h3>
                        <p>{$data[15]}</p>
                        <p class='prix'>{$data[1]} / {$data[2]} / {$data[3]} €</p>
                    </div>
                </a>";
            }
            fclose($handle);
        }
        ?>
       
    </div>
</main>

    <footer>
    <?php include('include/footer.php');?>
    </footer>
                <!-- responsive nav -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const burger = document.querySelector('.burger');
            const navLinks = document.querySelector('.nav-links');

            burger.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
