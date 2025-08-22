<?php

namespace Stagiaire\LeBonCoin\controller;

use Stagiaire\LeBonCoin\models\User;

class AuthController {

    public function loginForm() {
        $error = $_GET['error'] ?? null;
        $success = $_GET['success'] ?? null;
        require_once __DIR__ . '/../views/auth.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $user = User::getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                // Utilise la clé 'username' de la base de données
                $_SESSION['user'] = ['email' => $user['email'], 'username' => $user['username']]; 
                $_SESSION['success_message'] = 'Vous êtes bien connecté !';
                header('Location: /LeBonCoin/');
                exit;
            } else {
                header('Location: /LeBonCoin/auth?error=Email ou mot de passe incorrect.');
                exit;
            }
        }
    }

    public function registerForm() {
        $error = $_GET['error'] ?? null;
        $success = $_GET['success'] ?? null;
        require_once __DIR__ . '/../views/auth.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $name = $_POST['name'] ?? '';

            if (empty($email) || empty($password) || empty($name)) {
                header('Location: /LeBonCoin/register?error=Tous les champs sont requis.');
                exit;
            }

            if (User::getUserByEmail($email)) {
                header('Location: /LeBonCoin/register?error=Cet email est déjà utilisé.');
                exit;
            }

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Le modèle `User` utilise le nom (`$name`) pour la colonne `username`
            if (User::createUser($name, $email, $hashed_password)) {
                header('Location: /LeBonCoin/auth?success=Inscription réussie ! Vous pouvez maintenant vous connecter.');
                exit;
            } else {
                header('Location: /LeBonCoin/register?error=Une erreur est survenue lors de l\'inscription.');
                exit;
            }
        }
    }
    
    public function logout() {
        session_start();
        session_destroy();
        header('Location: /LeBonCoin/auth');
        exit;
    }
}