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
    <header>
    <?php include('/Applications/MAMP/htdocs/S105/include/header.php');?>
    </header>

    <div class="content-container">
        <!-- Première section -->
        <section>
            <h2>Il n’a jamais été meilleur temps pour dresser une mouche.</h2>
            <p class="text">Pour les fêtes, offrez la mouche qui fera bourdonner le cœur de votre famille.</p>
            <a class="bouton" href="catalogue.php">Explorer notre catalogue</a>
        </section>

        <!-- Deuxième section à droite de la première -->
        <section>
            <h2>Les combats de mouches accessibles facilement.</h2>
            <p class="text">Avec notre système de combat, il n'a jamais été aussi simple de combattre.</p>
            <a class="bouton" href="arene.php">Entrez dans l'arène</a>
        </section>
    </div>

    <!-- Bloc 2 sous les sections -->
    <div class="bloc2">
        <h2>Entrez dans l’arène !</h2>
        <img class="dessin" src="img/Arêne.jpg">
    </div>

    <footer>
    <?php include('/Applications/MAMP/htdocs/S105/include/footer.php');?>
    </footer>

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
