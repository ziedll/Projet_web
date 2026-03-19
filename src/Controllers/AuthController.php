<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Repositories\UserRepository;

class AuthController extends Controller {
    public function login() {
        if (Auth::isLoggedIn()) $this->redirect('/');
        
        $error = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['mdp'] ?? '';

            $userRepo = new UserRepository();
            $user = $userRepo->getByEmail($email);

            if ($user && password_verify($password, $user['mdp'])) {
                Auth::login($user);
                $this->redirect(BASE_URL);
            } else {
                $error = "Identifiants invalides.";
            }
        }

        $this->render('login', [
            'error' => $error,
            'title' => 'Connexion - Cubic Infrastructure'
        ]);
    }

    public function register() {
        if (Auth::isLoggedIn()) $this->redirect('/');
        
        $error = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['mdp'] ?? '';

            $userRepo = new UserRepository();
            if ($userRepo->getByEmail($email)) {
                $error = "Cet email est déjà utilisé.";
            } else {
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $userRepo->create([
                    'pseudo' => $pseudo,
                    'email' => $email,
                    'mdp' => $hashed,
                    'role' => 'user',
                    'credit' => 100 
                ]);
                $this->redirect(BASE_URL . 'login?msg=Inscription réussie ');
            }
        }

        $this->render('register', [
            'error' => $error,
            'title' => 'Inscription - Cubic Infrastructure'
        ]);
    }

    public function logout() {
        Auth::logout();
        $this->redirect(BASE_URL);
    }
}
