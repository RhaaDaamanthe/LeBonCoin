<?php
// app/controller/HomeController.php
namespace Stagiaire\LeBonCoin\controller;

class HomeController {
    public function index() {
        // Le chemin de la vue doit être correct
        require_once __DIR__ . '/../views/home.php';
    }
}