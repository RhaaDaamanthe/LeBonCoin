<?php

namespace Stagiaire\LeBonCoin\models;

use Stagiaire\LeBonCoin\database\Connection;

class User {

    // Sélectionne l'utilisateur par email
    public static function getUserByEmail($email) {
        $pdo = Connection::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    // Crée un nouvel utilisateur
    public static function createUser($name, $email, $password) {
        $pdo = Connection::getInstance();
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $password]);
    }
}