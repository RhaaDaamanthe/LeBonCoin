<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LeBonCoin/public/css/style.css">
    <title>Vendre - LeBonTruc</title>
</head>
<body>
    <header>
        <div class="header-vendre flex">
            <a href="/LeBonCoin/">
                <img src="/LeBonCoin/public/images/icones/close.svg" alt="Retour">
            </a>
            <h1>Vends un article</h1>
        </div>
    </header>

    <main id="page-vendre">
        <form action="/vendre" method="POST" enctype="multipart/form-data">
            <div class="ajouter_photos">
                <label for="image" class="upload-button">Ajouter une photo</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <div class="section-container">
                <label for="title">Titre de l'annonce</label>
                <input type="text" id="title" name="title" placeholder="Quel est votre article ?" required>
            </div>

            <div class="section-container">
                <label for="description">Description de l'article</label>
                <textarea id="description" name="description" placeholder="Plus de détails sur l'article..." required></textarea>
            </div>




            <div class="cateprix-container">
                <a href="/vendre/categorie" class="section-link flex">
                    <label>Catégorie</label>
                    <img src="/LeBonCoin/public/images/icones/arrow.svg" alt="Flèche">
                </a>
            </div>

            <div class="cateprix-container">
                <a href="/vendre/prix" class="section-link flex">
                    <label>Prix</label>
                    <img src="/LeBonCoin/public/images/icones/arrow.svg" alt="Flèche">
                </a>
            </div>

            <button type="submit" id="publier-button">Publier</button>
        </form>
    </main>

    <footer>

    </footer>
</body>
</html>