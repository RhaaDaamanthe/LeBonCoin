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

            <div class="cateprix-container" id="openCategoryModal">
                <div class="section-link flex">
                    <label>Catégorie</label>
                    <span id="categoryLabel" class="selected-value">Choisir une catégorie</span>
                    <img src="/LeBonCoin/public/images/icones/arrow.svg" alt="Flèche">
                </div>
            </div>
            <input type="hidden" id="categoryInput" name="category_id" required>

            <div class="cateprix-container" id="openPriceModal">
                <div class="section-link flex">
                    <label>Prix</label>
                    <span id="priceLabel" class="selected-value">Choisir un prix</span>
                    <img src="/LeBonCoin/public/images/icones/arrow.svg" alt="Flèche">
                </div>
            </div>
            <input type="hidden" id="priceInput" name="price" required>


            <button type="submit" id="publier-button">Publier</button>
        </form>
    </main>

    <div id="categoryModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header flex">
                <h2>Catégories</h2>
                <span class="close-button" id="closeCategoryModal">&times;</span>
            </div>
            <div class="modal-body">
                <div class="category-option" data-id="1">Immobilier</div>
                <div class="category-option" data-id="2">Véhicules</div>
                <div class="category-option" data-id="3">Électronique</div>
                <div class="category-option" data-id="4">Loisirs</div>
                <div class="category-option" data-id="5">Animaux</div>
                <div class="category-option" data-id="6">Vêtements</div>
            </div>
        </div>
    </div>

    <div id="priceModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header flex">
                <h2>Prix</h2>
                <span class="close-button" id="closePriceModal">&times;</span>
            </div>
            <div class="modal-body">
                <div class="price-input-container">
                    <input type="number" id="price-input-modal" placeholder="Prix" required>
                </div>
                <button id="validatePriceButton">Valider</button>
            </div>
        </div>
    </div>

    <script>
        // Gestion des modales
        document.getElementById('openCategoryModal').addEventListener('click', function() {
            document.getElementById('categoryModal').style.display = 'flex';
        });

        document.getElementById('closeCategoryModal').addEventListener('click', function() {
            document.getElementById('categoryModal').style.display = 'none';
        });
        
        document.getElementById('openPriceModal').addEventListener('click', function() {
            document.getElementById('priceModal').style.display = 'flex';
        });

        document.getElementById('closePriceModal').addEventListener('click', function() {
            document.getElementById('priceModal').style.display = 'none';
        });

        // Fermer la modale en cliquant en dehors
        window.onclick = function(event) {
            if (event.target.classList.contains('modal-overlay')) {
                event.target.style.display = 'none';
            }
        }

        // Événements pour la modale de catégorie
        document.querySelectorAll('.category-option').forEach(item => {
            item.addEventListener('click', event => {
                const categoryId = event.target.getAttribute('data-id');
                const categoryName = event.target.textContent;
                
                // Mettre à jour le champ caché du formulaire
                document.getElementById('categoryInput').value = categoryId;
                
                // Mettre à jour le label visible pour l'utilisateur
                document.getElementById('categoryLabel').textContent = categoryName;

                // Fermer la modale
                document.getElementById('categoryModal').style.display = 'none';
            });
        });

        // Événements pour la modale de prix
        document.getElementById('validatePriceButton').addEventListener('click', function() {
            const price = document.getElementById('price-input-modal').value;
            if (price) {
                // Mettre à jour le champ caché du formulaire
                document.getElementById('priceInput').value = price;
                
                // Mettre à jour le label visible
                document.getElementById('priceLabel').textContent = price + ' €';

                // Fermer la modale
                document.getElementById('priceModal').style.display = 'none';
            }
        });
    </script>
</body>
</html>