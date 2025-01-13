<?php
// Fonction pour lire les articles du panier depuis le fichier CSV
function lirePanier() {
    $panier = [];
    if (($handle = fopen('pagemouche/panier.csv', 'r')) !== false) {
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            // Vérifie que la ligne contient 7 éléments (nom, prix 3 tailles, 3 images)
            if (count($data) === 7) {
                $panier[] = [
                    'nom' => $data[0],
                    'prix' => [
                        'small' => (float)$data[1],
                        'medium' => (float)$data[2],
                        'large' => (float)$data[3]
                    ],
                    'images' => [
                        'small' => $data[4],
                        'medium' => $data[5],
                        'large' => $data[6]
                    ]
                ];
            }
        }
        fclose($handle);
    }
    return $panier;
}

// Fonction pour ajouter un article au panier
function ajouterAuPanier($nom, $prix, $image, $taille, $description) {
    $panier = lirePanier();
    $panier[] = compact('nom', 'prix', 'image', 'taille', 'description');
    $handle = fopen('pagemouche/panier.csv', 'w');
    foreach ($panier as $article) {
        fputcsv($handle, $article);
    }
    fclose($handle);
}

// Fonction pour retirer un article du panier
function retirerDuPanier($index) {
    $panier = lirePanier();
    if (isset($panier[$index])) {
        unset($panier[$index]);
        $panier = array_values($panier); // Réindexer
        $handle = fopen('pagemouche/panier.csv', 'w');
        foreach ($panier as $article) {
            fputcsv($handle, $article);
        }
        fclose($handle);
    }
}

// Fonction pour vider le panier
function viderPanier() {
    file_put_contents('pagemouche/panier.csv', ''); // Vide le fichier CSV
}

// Traiter l'ajout d'un article
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'], $_POST['product_price'], $_POST['product_image'], $_POST['size'], $_POST['product_description'])) {
    ajouterAuPanier($_POST['product_name'], $_POST['product_price'], $_POST['product_image'], $_POST['size'], $_POST['product_description']);
    header('Location: panier.php');
    exit;
}

// Traiter la suppression d'un article
if (isset($_GET['action']) && $_GET['action'] === 'retirer' && isset($_GET['index'])) {
    $index = (int)$_GET['index'];
    retirerDuPanier($index);
    header('Location: panier.php');
    exit;
}

// Vider le panier
if (isset($_GET['action']) && $_GET['action'] === 'vider') {
    viderPanier();
    header('Location: panier.php');
    exit;
}

// Contenu du panier
$panier = lirePanier();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <style>
        /* Styles CSS ici */
    </style>
</head>
<body>
    <div class="panier-container">
        <h1>Mon Panier</h1>
        <?php if (empty($panier)): ?>
            <p>Votre panier est vide.</p>
        <?php else: ?>
            <?php foreach ($panier as $index => $article): ?>
                <div class="panier-item">
                    <img src="<?= $article['image'] ?>" alt="<?= $article['nom'] ?>">
                    <div class="panier-item-details">
                        <strong><?= $article['nom'] ?> (<?= $article['taille'] ?>)</strong>
                        <p><?= $article['description'] ?></p>
                    </div>
                    <div class="panier-item-price">
                        <?= $article['prix'] ?> €
                    </div>
                    <div class="panier-item-action">
                        <a href="?action=retirer&index=<?= $index ?>">Retirer</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="panier-total">
                <strong>Total :</strong> <?= array_sum(array_column($panier, 'prix')) ?> €
            </div>
            <div class="actions">
                <a href="?action=vider">Vider le panier</a>
            </div>
        <?php endif; ?>
        <div class="actions">
            <a href="index.php">Retour au catalogue</a>
        </div>
    </div>
</body>
</html>
