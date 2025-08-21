<?php
namespace Stagiaire\LeBonCoin\controller;

class AuthController {
    private $users = []; // Simule une base de données (à remplacer par une vraie DB)

    public function __construct() {
        // Données de test
        $this->users = [
            'test@example.com' => ['password' => password_hash('password123', PASSWORD_DEFAULT), 'name' => 'Test User']
        ];
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (isset($this->users[$email]) && password_verify($password, $this->users[$email]['password'])) {
                session_start();
                $_SESSION['user'] = ['email' => $email, 'name' => $this->users[$email]['name']];
                header('Location: /');
                exit;
            } else {
                $error = "Email ou mot de passe incorrect.";
                require_once __DIR__ . '/../views/auth.php';
                return;
            }
        }
        require_once __DIR__ . '/../views/auth.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $name = $_POST['name'] ?? '';

            if (empty($email) || empty($password) || empty($name)) {
                $error = "Tous les champs sont requis.";
                require_once __DIR__ . '/../views/auth.php';
                return;
            }

            if (isset($this->users[$email])) {
                $error = "Cet email est déjà utilisé.";
                require_once __DIR__ . '/../views/auth.php';
                return;
            }

            $this->users[$email] = [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'name' => $name
            ];
            $success = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
            require_once __DIR__ . '/../views/auth.php';
            return;
        }
        header('Location: /auth#register-tab');
        exit;
    }
}
?>