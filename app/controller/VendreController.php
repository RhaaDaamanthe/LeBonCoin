<?php
// app/controller/VendreController.php
namespace Stagiaire\LeBonCoin\controller;

class VendreController {
    public function index() {
        // Le chemin de la vue doit être correct
        require_once __DIR__ . '/../views/vendre.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $price = $_POST['price'] ?? '';
            $description = $_POST['description'] ?? '';

            echo "Annonce publiée : $title - $price € - $description";
            header('Location: /LeBonCoin/vendre'); 
            exit;
        }
    }
}