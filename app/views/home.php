<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LeBonCoin/public/css/style.css">
    <title>Accueil - LeBonTruc</title>
</head>
<body>
<?php
// Affiche le message de bienvenue s'il existe (message flash)
if (isset($_SESSION['welcome_message'])) {
    echo "<div class='notification welcome-message'>" . htmlspecialchars($_SESSION['welcome_message']) . "</div>";
    unset($_SESSION['welcome_message']); // 👈 Supprime le message après l'avoir affiché
}

// Affiche le message de succès s'il existe
if (isset($_SESSION['success_message'])) {
    echo "<div class='notification success-message'>" . htmlspecialchars($_SESSION['success_message']) . "</div>";
    unset($_SESSION['success_message']);
}
?>
    <header>
        <div class="header flex">
            <img src="/LeBonCoin/public/images/icones/burger.svg" alt="Menu burger">
            <h1>LeBonTruc</h1>
            <img src="/LeBonCoin/public/images/icones/notif.svg" alt="Notif">
        </div>

        <div class="header-bottom">
            <form action="/recherche" method="GET" class="search-bar flex">
                <img src="/LeBonCoin/public/images/icones/search.svg" alt="Barre de recherche">
                <input type="text" class="search-input" placeholder="Rechercher sur LeBonTruc">
            </form>
            <div class="categories_suggest">
                <div class="category-item">
                    <a href="/LeBonCoin/categories/immobilier">
                        <img src="/LeBonCoin/public/images/icones/house.svg" alt="Catégorie Immobilier">
                    </a>
                    <span>Immobilier</span>
                </div>
                <div class="category-item">
                    <a href="/LeBonCoin/categories/vehicules">
                        <img src="/LeBonCoin/public/images/icones/car.svg" alt="Catégorie Véhicules">
                    </a>
                    <span>Véhicules</span>
                </div>
                <div class="category-item">
                    <a href="/LeBonCoin/categories/electronique">
                        <img src="/LeBonCoin/public/images/icones/phone.svg" alt="Catégorie Électronique">
                    </a>
                    <span>Électronique</span>
                </div>
                <div class="category-item">
                    <a href="/LeBonCoin/categories/loisirs">
                        <img src="/LeBonCoin/public/images/icones/loisir.svg" alt="Catégorie Loisirs">
                    </a>
                    <span>Loisirs</span>
                </div>
                <div class="category-item">
                    <a href="/LeBonCoin/categories/autre">
                        <img src="/LeBonCoin/public/images/icones/other.svg" alt="Catégorie Autre">
                    </a>
                    <span>Autre</span>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="annonces">
            <h2>Annonces récentes</h2>
            <div class="annonces-grid">
                <?php foreach ($annonces as $annonce): ?>
                <div class="card-annonce">
                    <?php
                    $images = json_decode($annonce['images'], true);
                    $first_image = $images[0] ?? null;
                    if ($first_image):
                    ?>
                        <img src="/LeBonCoin/public/images/annonces/<?php echo htmlspecialchars($first_image); ?>" alt="<?php echo htmlspecialchars($annonce['title']); ?>">
                    <?php else: ?>
                        <img src="/LeBonCoin/public/images/default.jpg" alt="Image par défaut">
                    <?php endif; ?>

                    <h3><?php echo htmlspecialchars($annonce['title']); ?></h3>
                    <div class="price"><?php echo number_format($annonce['price'], 2, ',', ' '); ?> €</div>
                    <div class="location">Lieu inconnu</div>
                    <div class="date"><?php echo htmlspecialchars((new DateTime($annonce['created_at']))->format('d/m/Y H:i')); ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-icons">
            <a href="/">
                <img src="/LeBonCoin/public/images/icones/search.svg" alt="Recherche">
                <span>Recherche</span>
            </a>
            <a href="/">
                <img src="/LeBonCoin/public/images/icones/favorite.svg" alt="Favoris">
                <span>Favoris</span>
            </a>
            <a href="/LeBonCoin/vendre">
                <img src="/LeBonCoin/public/images/icones/add.svg" alt="Ajouter">
                <span>Ajouter</span>
            </a>
            <a href="/">
                <img src="/LeBonCoin/public/images/icones/message.svg" alt="Messages">
                <span>Messages</span>
            </a>
            <a href="/LeBonCoin/auth">
                <img src="/LeBonCoin/public/images/icones/account.svg" alt="Profil">
                <span>Profil</span>
            </a>
        </div>
    </footer>
</body>
</html>