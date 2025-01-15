<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue - Mouches de Combat</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/catalogues.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
</head>

<body>
    <header>
    <?php include('include/header.php');?>
    </header>


<main class="catalogue">

    <h1>Découvrez nos mouches</h1> 
    <div class="nav-catalogue">
        <ul>
            <li><a href="#1">Dernières espèces</a></li>
            <li><a href="#2">Nos incontournables</a></li>
        </ul>
    </div>
    <div class="premier">
        <img src="img/mouche-gladiator.jpeg" alt="mouche gladiator image">
                <h2> L'indétronable Gladiator </h2>
                <p> Sa robustesse adapté àl'apprentissage, la Gladiator est parfaite pour les débutants, elle saura aussi satisfaire les experts comme tank en combat 2v2. </p>
             <a href="pagemouche/mouchegladiator.php" class="buy-button">Acheter</a>

    </div>
    <h2 id="1"> Nos dernières espèces </h2>
    <div class="container">
    <?php
        // Charger les produits depuis le CSV
        if (($handle = fopen("products.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                echo "
                <a class='article' href='product.php?name={$data[0]}'>
                    <img src='{$data[4]}' alt='{$data[0]}'>
                    <div class='texte'>
                        <h3>{$data[0]}</h3>
                        <p>Prix : {$data[1]} €</p>
                    </div>
                </a>";
            }
            fclose($handle);
        }
        ?>

        <div class="article">
            <img src="img/mouche-spider.jpeg" alt="Mouche Spider image">
            <div class="texte">
                <h3> Mouche Spider </h3>
                <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
            </div>
        </div>
        <div class="article">
            <img src="img/mouche-electrizer.jpeg" alt="Mouche Electrizer image">
            <div class="texte">
                <h3> Mouche Electrizer </h3>
                <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
            </div>
        </div>
    </div>
    <h2 id="2"> Nos incontournables </h2>
    <div class="container">
    <a class="article" href="pagemouche/mouchegladiator.php">  
        <img src="img/mouche-gladiator.jpeg" alt="mouche gladiator image">
        <div class="texte">
            <h3> Mouche gladiator </h3>
            <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
        </div>
    </a>
        <div class="article">
            <img src="img/mouche-gladiator.jpeg" alt="mouche gladiator image">
            <div class="texte">
                <h3> Mouche gladiator </h3>
                <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
            </div>
        </div>
        <div class="article">
            <img src="img/mouche-gladiator.jpeg" alt="mouche gladiator image">
            <div class="texte">
                <h3> Mouche gladiator </h3>
                <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
            </div>
        </div>
    </div>
       
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
