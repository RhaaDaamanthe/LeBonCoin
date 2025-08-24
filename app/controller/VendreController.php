<?php

namespace Stagiaire\LeBonCoin\controller;

use Stagiaire\LeBonCoin\database\Connection;
use PDO;

class VendreController
{
    private $pdo;

    public function __construct()
    {
        // La méthode getInstance() de votre classe Connection retourne directement l'objet PDO.
        // Il n'est donc pas nécessaire d'appeler une méthode getConnection().
        $this->pdo = Connection::getInstance();
    }

    public function index()
    {
        // Cette méthode est utilisée pour afficher le formulaire de vente.
        require_once __DIR__ . '/../views/vendre.php';
    }

    public function store()
    {
        session_start();
        // Vérifier si l'utilisateur est connecté. Si non, le rediriger.
        if (!isset($_SESSION['user'])) {
            header('Location: /LeBonCoin/auth');
            exit;
        }

        // Vérifier si la requête est bien une soumission de formulaire POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? 0;
            $category_id = $_POST['category_id'] ?? 0;
            
            // Note : Pour le moment, l'ID de l'utilisateur est codé en dur à '1'
            // Vous devrez le remplacer par l'ID réel de l'utilisateur connecté via la session
            $user_id = $_SESSION['user']['id'] ?? 1;

            if (empty($title) || empty($description) || empty($price) || empty($category_id)) {
                $_SESSION['error_message'] = "Veuillez remplir tous les champs.";
                header('Location: /LeBonCoin/vendre');
                exit;
            }

            try {
                // Requête d'insertion sécurisée avec des paramètres pour éviter les injections SQL
                $stmt = $this->pdo->prepare("INSERT INTO annonces (user_id, category_id, title, description, price, created_at) VALUES (:user_id, :category_id, :title, :description, :price, NOW())");
                
                $stmt->execute([
                    'user_id' => $user_id,
                    'category_id' => $category_id,
                    'title' => $title,
                    'description' => $description,
                    'price' => $price
                ]);

                // Message de succès stocké en session
                $_SESSION['success_message'] = "Votre annonce a été publiée avec succès !";
                
                // Redirection vers la page d'accueil
                header('Location: /LeBonCoin/');
                exit;

            } catch (\PDOException $e) {
                // Gestion des erreurs de la base de données
                $_SESSION['error_message'] = "Une erreur est survenue lors de la publication de l'annonce : " . $e->getMessage();
                header('Location: /LeBonCoin/vendre');
                exit;
            }
        }
    }
}