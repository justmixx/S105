<?php
$titre='TITRE';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Mouches de Combat</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="website icon" type="svg" href="img/logo.svg">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
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
                <a href="panier.php"><span class="material-symbols-outlined">
        shopping_cart
        </span>mon panier</a>
            </div>
        </div>
    </nav>

    <main>
        <section>
            <h2>Découvrez les mouches de combat</h2>
            <p>Les mouches de combat, élevées avec soin, sont prêtes à démontrer leur puissance dans les compétitions les plus intenses.</p>
            <p>Nous sélectionnons les meilleures espèces pour garantir des performances exceptionnelles.</p>
        </section>

        <section>
            <h2>Pourquoi choisir nos mouches ?</h2>
            <p>Notre plateforme offre une variété de mouches soigneusement élevées, adaptées aux besoins des amateurs comme des professionnels.</p>
            <p>Regardez cette vidéo pour découvrir une démonstration captivante de mouches de combat en action.</p>
            <figure>
                <video controls>
                    <source src="img/mouches-combat-demo.mp4" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture de vidéos.
                </video>
                <figcaption>Une démonstration de mouches de combat en pleine action.</figcaption>
            </figure>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Mouches de Combat</p>
        <nav>
            <ul>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="mentions-legales.php">Mentions légales</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>
