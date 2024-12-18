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

<header>
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
</header>
<body>
    <section>
         <h2>Il n’a jamais été meilleur temps pour dresser une mouche. </h2>
          <p>Pour les fêtes, offrer la mouche qui fera bourdonnées le coeur de votre famille.</p>
          <a id="bouton" href="catalogue.php"> <p>Explorer notre catalogue </a>
    </section>

    <div class="bloc2">
            <h2>Entrez dans l’arène !</h2>
            <img class="mouche" src="logo.svg">
            <img class="dessin" src="img/Arêne.jpg">
        
</div>
    
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
