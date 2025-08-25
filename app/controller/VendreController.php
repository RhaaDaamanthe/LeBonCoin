<?php

namespace Stagiaire\LeBonCoin\controller;

use Stagiaire\LeBonCoin\database\Connection;
use PDO;

class VendreController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    public function index()
    {
        require_once __DIR__ . '/../views/vendre.php';
    }

    public function store()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header('Location: /LeBonCoin/auth');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 🚨 Début de la validation demandée : on vérifie si au moins une image a été uploadée. 🚨
            // On vérifie si le champ 'images' est présent, si c'est un tableau et si son premier élément a un nom.
            if (!isset($_FILES['images']) || !is_array($_FILES['images']['name']) || empty($_FILES['images']['name'][0])) {
                $_SESSION['error_message'] = "Vous devez ajouter au moins une image pour créer une annonce.";
                header('Location: /LeBonCoin/vendre');
                exit;
            }
            // 🚨 Fin de la validation 🚨

            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? 0;
            $category_id = $_POST['category_id'] ?? 0;
            $user_id = $_SESSION['user']['id'] ?? 1;

            if (empty($title) || empty($description) || empty($price) || empty($category_id)) {
                $_SESSION['error_message'] = "Veuillez remplir tous les champs.";
                header('Location: /LeBonCoin/vendre');
                exit;
            }

            $images_names = [];
            $upload_dir = __DIR__ . '/../../public/images/annonces/';
            
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (isset($_FILES['images']) && is_array($_FILES['images']['name'])) {
                for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
                    if ($_FILES['images']['error'][$i] === UPLOAD_ERR_OK) {
                        $file_tmp_path = $_FILES['images']['tmp_name'][$i];
                        $file_name = $_FILES['images']['name'][$i];
                        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                        
                        $unique_name = uniqid() . '.' . $file_extension;
                        $destination_path = $upload_dir . $unique_name;

                        if (move_uploaded_file($file_tmp_path, $destination_path)) {
                            $images_names[] = $unique_name;
                        } else {
                            $_SESSION['error_message'] = "Erreur lors du téléchargement d'une des images.";
                            header('Location: /LeBonCoin/vendre');
                            exit;
                        }
                    }
                }
            }

            try {
                $stmt = $this->pdo->prepare("INSERT INTO annonces (user_id, category_id, title, description, price, images, created_at) VALUES (:user_id, :category_id, :title, :description, :price, :images, NOW())");
                
                $stmt->execute([
                    'user_id' => $user_id,
                    'category_id' => $category_id,
                    'title' => $title,
                    'description' => $description,
                    'price' => $price,
                    'images' => json_encode($images_names)
                ]);

                $_SESSION['success_message'] = "Votre annonce a été publiée avec succès !";
                header('Location: /LeBonCoin/');
                exit;

            } catch (\PDOException $e) {
                $_SESSION['error_message'] = "Une erreur est survenue lors de la publication de l'annonce : " . $e->getMessage();
                header('Location: /LeBonCoin/vendre');
                exit;
            }
        }
    }
}