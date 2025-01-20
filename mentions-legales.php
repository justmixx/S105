<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/mention-legal.css">
    <title>Mentions Légales</title>
</head>
<body>

    <header>
        <?php include('include/header.php');?>
    </header>

    <div class="container">
        <h1>Mentions Légales</h1>
        <div class="section">
            <h2>Éditeur du site</h2>
            <p>
                Nom de l'entreprise : Mouche de combat<br>
                Adresse : 123 Rue de l'Automobile, 73000 Chambéry<br>
                Téléphone : +33 6 12 34 56 78<br>
                Email : contact@mouchedecombat.fr<br>
                SIRET : 123 456 789 00012
            </p>
        </div>

        <div class="section">
            <h2>Hébergement</h2>
            <p>
                Hébergeur : OVHcloud<br>
                Adresse : 2 Rue Kellermann, 59100 Roubaix, France<br>
                Téléphone : +33 9 72 10 10 07<br>
                Site web : <a href="https://www.ovhcloud.com" target="_blank">www.ovhcloud.com</a>
            </p>
        </div>

        <div class="section">
            <h2>Propriété intellectuelle</h2>
            <p>
                Tous les contenus présents sur ce site (textes, images, vidéos, etc.) sont protégés par les lois sur la propriété intellectuelle. Toute reproduction, distribution ou utilisation non autorisée est interdite sans accord préalable.
            </p>
        </div>

        <div class="section">
            <h2>Responsabilité</h2>
            <p>
                ChronoClips ne pourra être tenue responsable des dommages directs ou indirects résultant de l'utilisation du site ou de l'impossibilité d'y accéder.
            </p>
        </div>

        <div class="section">
            <h2>Cookies</h2>
            <p>
                Ce site utilise des cookies pour améliorer votre expérience utilisateur. Vous pouvez configurer votre navigateur pour refuser les cookies.
            </p>
        </div>
    </div>

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
