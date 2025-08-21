<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LeBonCoin/public/css/style.css">
    <title>Accueil - LeBonTruc</title>
</head>
<body>
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

                <div class="card-annonce">
                    <img src="/LeBonCoin/public/images/camaro.jpg" alt="Annonce1">
                    <h3>Voiture Camaro</h3>
                    <div class="price">60 000 €</div>
                    <div class="location">Bellignat 01100</div>
                    <div class="date">Aujourd'hui 10h38</div>
                </div>
                
                <div class="card-annonce">
                    <img src="/LeBonCoin/public/images/demon slayer.jpg" alt="Annonce2">
                    <h3>Mangas collection intégrale Demon Slayer</h3>
                    <div class="price">120 €</div>
                    <div class="location">Oyonnax 01100</div>
                    <div class="date">29/07/2025</div>
                </div>

                <div class="card-annonce">
                    <img src="/LeBonCoin/public/images/pc.jpg" alt="Annonce3">
                    <h3>Pc gamer</h3>
                    <div class="price">1 500 €</div>
                    <div class="location">Bellignat 01100</div>
                    <div class="date">Hier 2h47</div>
                </div>

                <div class="card-annonce">
                    <img src="/LeBonCoin/public/images/villa.jpg" alt="Annonce4">
                    <h3>Villa bord de mer</h3>
                    <div class="price">14 000 000 €</div>
                    <div class="location">Venise 25598</div>
                    <div class="date">02/09/2002</div>
                </div>

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