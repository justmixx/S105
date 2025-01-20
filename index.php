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
</head>

<body>
    <header>
        <?php include('include/header.php');?>
    </header>

    <div class="slider-container">
        <div class="slider">
            <div class="slide">
                <div class="overlay">
                <a class="button" href="catalogue.php">Catalogue</a>
                </div>
                <img src="img/slider/slider1.jpeg" alt="Image 1">
            </div>
            <div class="slide">
                <div class="overlay">
                <a class="button" href="catalogue.php">Mouche Spider</a>
                </div>
                <img src="img/slider/slider2.jpeg" alt="Image 2">
            </div>
            <div class="slide">
                <div class="overlay">
                <a class="button" href="catalogue.php">Nouveau : Gladiator</a>
                </div>
                <img src="img/slider/slider3.jpeg" alt="Image 3">
            </div>
        </div>
        <button class="prev" onclick="changeSlide(-1)"><img src="img/fleches/gauche.png" alt="avant"></button>
        <button class="next" onclick="changeSlide(1)"><img src="img/fleches/droite.png" alt="arrière"></button>
    </div>

    <script src="script.js"></script>
    <div class="content-container">
        <!-- Première section -->
        <section>
            <h2>Il n’a jamais été meilleur temps pour dresser une mouche.</h2>
            <p class="text">Pour les fêtes, offrez la mouche qui fera bourdonner le cœur de votre famille.</p>
            <a class="button bouton" href="catalogue.php">Explorer notre catalogue</a>
        </section>

        <!-- Deuxième section à droite de la première -->
        <iframe src="https://www.youtube.com/embed/PL3Odw-k8W4?si=Vw31byHBnJZfvxnj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

    <!-- Bloc 2 sous les sections -->
    <div class="bloc2" id="trackingDiv">
        <h2>Entrez dans l’arène !</h2>
        <img class="dessin" src="img/arene.jpg" alt="Illustration de l'arène">
        <a class="followbut button anchor" id="followButton" href="arene.php">COMBAT !</a>
    </div>
    <script>
        const trackingDiv = document.getElementById('trackingDiv');
        const followButton = document.getElementById('followButton');

        // Active le suivi lorsque la souris est dans la div
        trackingDiv.addEventListener('mousemove', (e) => {
            const rect = trackingDiv.getBoundingClientRect(); // Dimensions de la div
            const x = e.clientX - rect.left; // Position X relative
            const y = e.clientY - rect.top;  // Position Y relative

            followButton.style.left = `${x}px`;
            followButton.style.top = `${y}px`;
            followButton.style.display = 'block'; // Affiche le bouton
        });

        // Cache le bouton lorsque la souris quitte la div
        trackingDiv.addEventListener('mouseleave', () => {
            followButton.style.display = 'none'; // Cache le bouton
        });

        followAnchor.style.display = 'block';
    </script>

    <footer>
        <?php include('include/footer.php');?>
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
