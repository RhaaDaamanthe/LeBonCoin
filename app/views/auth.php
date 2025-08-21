<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LeBonCoin/public/css/auth.css">
    <title>Connexion/Inscription - LeBonTruc</title>
</head>
<body>
    <header>
        <div class="header-vendre flex">
            <a href="/"><img src="/LeBonCoin/public/images/icones/close.svg" alt="Retour"></a>
            <h1>LeBonTruc</h1>
        </div>
    </header>

    <main id="page-login">
        <div class="login-container">
            <?php
            $error = isset($error) ? $error : '';
            $success = isset($success) ? $success : '';
            if ($error) echo "<p class='error-message'>$error</p>";
            if ($success) echo "<p class='success-message'>$success</p>";
            ?>

            <div class="tab-buttons">
                <button class="tab-button active" onclick="showTab('login')">Connexion</button>
                <button class="tab-button" onclick="showTab('register')">Inscription</button>
            </div>

            <form action="/auth" method="POST" class="tab-content" id="login-tab">
                <div class="section-container">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Votre email" required>
                </div>
                <div class="section-container">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                </div>
                <button type="submit" id="publier-button">Se connecter</button>
            </form>

            <form action="/register" method="POST" class="tab-content" id="register-tab" style="display: none;">
                <div class="section-container">
                    <label for="reg-email">Email</label>
                    <input type="email" id="reg-email" name="email" placeholder="Votre email" required>
                </div>
                <div class="section-container">
                    <label for="reg-password">Mot de passe</label>
                    <input type="password" id="reg-password" name="password" placeholder="Votre mot de passe" required>
                </div>
                <div class="section-container">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" placeholder="Votre nom" required>
                </div>
                <button type="submit" id="publier-button">S'inscrire</button>
            </form>
        </div>
    </main>

    <footer>

    </footer>

    <script>
        function showTab(tabId) {
            const tabs = document.getElementsByClassName('tab-content');
            for (let tab of tabs) {
                tab.style.display = 'none';
            }
            document.getElementById(tabId + '-tab').style.display = 'block';

            const buttons = document.getElementsByClassName('tab-button');
            for (let button of buttons) {
                button.classList.remove('active');
            }
            event.target.classList.add('active');
        }
    </script>
</body>
</html>