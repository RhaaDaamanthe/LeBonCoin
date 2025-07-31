<?php
require __DIR__ . '/vendor/autoload.php';
require 'vendor/altorouter/altorouter/AltoRouter.php';

$router = new AltoRouter();

$router->setBasePath('/LeBonCoin'); 

// Définir vos routes
$router->map('GET', '/', 'HomeController#index', 'home');

$match = $router->match();

if ($match) {
    // Extraire le nom du contrôleur et de la méthode
    list($controllerName, $methodName) = explode('#', $match['target']);

    // Vérifier si la classe du contrôleur existe et est valide
    if (class_exists($controllerName)) {
        $controller = new $controllerName();

        // Vérifier si la méthode existe dans le contrôleur
        if (method_exists($controller, $methodName)) {
            // Appeler la méthode du contrôleur avec les paramètres de la route
            call_user_func_array([$controller, $methodName], $match['params']);
        } else {
            // Méthode non trouvée dans le contrôleur
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
            echo "Erreur 404: Action non trouvée. (Vérifiez la méthode dans le contrôleur)";
        }
    } else {
        // Contrôleur non trouvé
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        echo "Erreur 404: Contrôleur non trouvé. (Vérifiez le nom du contrôleur ou son namespace)";
    }
} else {
    // Aucune route correspondante n'a été trouvée
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "Erreur 404: Page non trouvée. (Vérifiez votre URL et vos routes dans index.php)";
}