<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Mouches de Combat</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
<header>
<?php include('/Applications/MAMP/htdocs/S105/include/header.php');?>
    </header>

    <main>
        <h1>Contactez-nous</h1>
        <div class="contact-container">
            <!-- Plan et adresse -->
            <div class="contact-map">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d243647.8248433651!2d-73.9395653315286!3d40.69766374839183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259af18cfa403%3A0xf5d4ad0b76c850!2sNew%20York%2C%20NY!5e0!3m2!1sen!2sus!4v1670849456585!5m2!1sen!2sus" 
                    width="400" 
                    height="300" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <p>Adresse : 123 Rue des Mouches, Combat City, France</p>
            </div>
            <!-- Informations de contact -->
            <div class="contact-info">
                <h2>Informations de contact</h2>
                <p><strong>Téléphone :</strong> +33 6 13 67 52 17</p>
                <p><strong>Email :</strong> justin.gonnet@gmail.com</p>
                <h3>Suivez-nous :</h3>
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank">
                        <img src="/Applications/MAMP/htdocs/S105/img/logo/facebook.png" alt="Facebook">
                    </a>
                    <a href="https://instagram.com" target="_blank">
                        <img src="/Applications/MAMP/htdocs/S105/img/logo/instagram.ico" alt="Instagram">
                    </a>
                    <a href="https://twitter.com" target="_blank">
                        <img src="../img/twitter-icon.svg" alt="Twitter">
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer>
    <?php include('/Applications/MAMP/htdocs/S105/include/footer.php');?>
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
