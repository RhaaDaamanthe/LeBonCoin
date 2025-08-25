<?php

namespace Stagiaire\LeBonCoin\controller;

use Stagiaire\LeBonCoin\models\Annonce;

class HomeController
{
    public function index()
    {
        $annonces = Annonce::getAllAnnonces();
        require_once __DIR__ . '/../views/home.php';
    }
}