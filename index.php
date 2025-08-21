<?php
// Démarrer la session en tout premier
session_start();

// Inclure l'autoloader de Composer en tout premier après session_start.
require __DIR__ . '/vendor/autoload.php';

// Initialiser AltoRouter.
$router = new AltoRouter();

// Définir la base path si votre projet est dans un sous-dossier (comme /LeBonCoin).
$router->setBasePath('/LeBonCoin'); 

// Définir vos routes
$router->map('GET', '/', 'Home#index', 'home');
$router->map('GET', '/vendre', 'Vendre#index', 'vendre_form');
$router->map('POST', '/vendre', 'Vendre#store', 'vendre_store');
$router->map('GET|POST', '/auth', 'Auth#login', 'auth'); // Changé de /login à /auth
$router->map('POST', '/register', 'Auth#register', 'register'); // Resté identique

// Faire correspondre l'URL actuelle avec une route
$match = $router->match();

// Traiter la correspondance
if ($match) {
    list($controllerName, $methodName) = explode('#', $match['target']);
    $controllerClass = "Stagiaire\\LeBonCoin\\controller\\" . $controllerName . "Controller"; 

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();
        if (method_exists($controller, $methodName)) {
            call_user_func_array([$controller, $methodName], $match['params']);
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
            echo "Erreur 404: Action non trouvée.";
        }
    } else {
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        echo "Erreur 404: Contrôleur non trouvé.";
    }
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "Erreur 404: Page non trouvée.";
}
?>