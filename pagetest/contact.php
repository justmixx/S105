<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Mouches de Combat</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="contact.css">
</head>

<body>
    <nav>
        <div class="nav-container">
                <a href="index.php" class="logo">
                    <img src="../img/logo.svg" alt="Logo Mouches de Combat">
                </a>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="catalogue.php">Catalogue</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="cart-link">
                <a href="panier.php">Mon Panier</a>
            </div>
        </div>
    </nav>

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
                <p><strong>Téléphone :</strong> +33 1 23 45 67 89</p>
                <p><strong>Email :</strong> contact@mouchesdecombat.fr</p>
                <h3>Suivez-nous :</h3>
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank">
                        <img src="../img/facebook-icon.svg" alt="Facebook">
                    </a>
                    <a href="https://instagram.com" target="_blank">
                        <img src="../img/instagram-icon.svg" alt="Instagram">
                    </a>
                    <a href="https://twitter.com" target="_blank">
                        <img src="../img/twitter-icon.svg" alt="Twitter">
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Mouches de Combat</p>
        <nav>
            <ul>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="../mentions-legales.php">Mentions légales</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>