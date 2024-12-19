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


    <main>
        <h1>Notre Catalogue de Mouches de Combat</h1>
        <table class="catalogue">
            <tr>
                <td>
                    <img src="img/mouche_gladiator_small.svg" alt="Mouche de combat 1">
                    <h2>Mouche Gladiator</h2>
                    <p>Prix : 50 - 150 flies</p>
                    <a href="pagemouche/produit.php">Voir le produit</a>
                </td>
                <td>
                    <img src="img/mouche2.jpg" alt="Mouche de combat 2">
                    <h2>Mouche Tornado</h2>
                    <p>Prix : 70 MoucheCoins</p>
                    <a href="pagemouche/produittest.php">Voir le produit</a>
                </td>
                <td>
                    <img src="img/mouche3.jpg" alt="Mouche de combat 3">
                    <h2>Mouche Shadow</h2>
                    <p>Prix : 65 MoucheCoins</p>
                    <a href="produit.php?id=3">Voir le produit</a>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/mouche4.jpg" alt="Mouche de combat 4">
                    <h2>Mouche Titan</h2>
                    <p>Prix : 80 MoucheCoins</p>
                    <a href="produit.php?id=4">Voir le produit</a>
                </td>
                <td>
                    <img src="img/mouche5.jpg" alt="Mouche de combat 5">
                    <h2>Mouche Viper</h2>
                    <p>Prix : 90 MoucheCoins</p>
                    <a href="produit.php?id=5">Voir le produit</a>
                </td>
                <td>
                    <img src="img/mouche6.jpg" alt="Mouche de combat 6">
                    <h2>Mouche Phantom</h2>
                    <p>Prix : 75 MoucheCoins</p>
                    <a href="produit.php?id=6">Voir le produit</a>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/mouche7.jpg" alt="Mouche de combat 7">
                    <h2>Mouche Blitz</h2>
                    <p>Prix : 60 MoucheCoins</p>
                    <a href="produit.php?id=7">Voir le produit</a>
                </td>
                <td>
                    <img src="img/mouche8.jpg" alt="Mouche de combat 8">
                    <h2>Mouche Crusher</h2>
                    <p>Prix : 85 MoucheCoins</p>
                    <a href="produit.php?id=8">Voir le produit</a>
                </td>
                <td>
                    <img src="img/mouche9.jpg" alt="Mouche de combat 9">
                    <h2>Mouche Inferno</h2>
                    <p>Prix : 95 MoucheCoins</p>
                    <a href="produit.php?id=9">Voir le produit</a>
                </td>
            </tr>
        </table>
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
