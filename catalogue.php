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
        <nav>
            <div class="nav-container">
                <a href="index.php" class="logo">
                    <img src="img/logo.svg" alt="Logo Mouches de Combat">
                </a>
                <div class="burger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <ul class="nav-links">
                    <li><a href="catalogue.php">Catalogue</a></li>
                    <li><a href="arene.php">Arène</a></li>
                    <li><a href="vendre.php">Vendre</a></li>
                    <li><a href="laboratoire.php">Notre laboratoire</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <div class="cart-link">
                    <a href="panier.php">
                        <span class="material-symbols-outlined">shopping_cart</span>
                        mon panier
                    </a>
                </div>
            </div>
        </nav>
    </header>


<main class="catalogue">
    <h1>Notre Catalogue de Mouches de Combat</h1>
    <p>Pour combat rapproché, à distance, puissance ou même juste pour de l'affection, nous possédons la mouche dont vous avez besoin.
    </p>
    <div class="premier">
        <img src="img/mouche-gladiator-ai.jpeg" alt="mouche gladiator image">
             <h2> Mouche gladiator </h2>
             <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
    </div>
    <div class="container">
    <a class="article" href="pagemouche/mouchegladiator.php">  
        <img src="img/mouche-gladiator-ai.jpeg" alt="mouche gladiator image">
        <div class="texte">
            <h2> Mouche gladiator </h2>
            <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
        </div>
    </a>
        <div class="article">
            <img src="img/mouche-gladiator-ai.jpeg" alt="mouche gladiator image">
            <div class="texte">
                <h2> Mouche gladiator </h2>
                <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
            </div>
        </div>
        <div class="article">
            <img src="img/mouche-gladiator-ai.jpeg" alt="mouche gladiator image">
            <div class="texte">
                <h2> Mouche gladiator </h2>
                <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
            </div>
        </div>
        <div class="article">
            <img src="img/mouche-gladiator-ai.jpeg" alt="mouche gladiator image">
            <div class="texte">
                <h2> Mouche gladiator </h2>
                <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
            </div>
        </div>
        <div class="article">
            <img src="img/mouche-gladiator-ai.jpeg" alt="mouche gladiator image">
            <div class="texte">
                <h2> Mouche gladiator </h2>
                <p> Parfaite pour vos premier combat, toujours présente pour les derniers. </p>
            </div>
        </div>

        
    </div>
</main>

    <footer>
        <nav>
            <ul>
                <li><a href="contact.php">Contact</a></li>
                <li><p>&copy; 2024 Mouches de Combat</p></li>
                <li><a href="mentions-legales.php">Mentions légales</a></li>
            </ul>
        </nav>
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
