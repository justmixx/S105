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
            <li><a href="index.php">Accueil</a></li>
            <li><a href="catalogue.php">Catalogue</a></li>
            <li><a href="arene.php">Arène</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="cart-link">
            <a class="button" href="panier.php">
                <img src="img/fleches/panier.png" alt="icon panier">
                mon panier
            </a>
        </div>
    </div>
</nav>
<script>
    // Sélectionner l'élément 'nav'
    const nav = document.querySelector('nav');

    // Détecter le défilement de la page
    window.onscroll = function() {
        if (window.scrollY > 50) { // Si la page est défilée de plus de 50px
            nav.classList.add('shrink'); // Ajouter la classe 'shrink'
        } else {
            nav.classList.remove('shrink'); // Supprimer la classe 'shrink'
        }
    };
</script>