<?php

namespace Stagiaire\LeBonCoin\models;

use Stagiaire\LeBonCoin\database\Connection;

class Annonce
{
    public static function getAllAnnonces()
    {
        $pdo = Connection::getInstance();
        $stmt = $pdo->query("SELECT * FROM annonces ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }
}