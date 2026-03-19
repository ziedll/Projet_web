<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Core\Auth;
use App\Repositories\UserRepository;

Auth::startSession();

$user = Auth::getUser();
$userRepo = new UserRepository();

if ($user) {
    $fresh = $userRepo->getFreshData($user['id']);
    if ($fresh) {
        $_SESSION['user']['role'] = $fresh['role'] ?? 'user';
        $_SESSION['user']['credit'] = $fresh['credit'] ?? 0;
    }
}

$current_uri = $_GET['url'] ?? '/';
$current_uri = '/' . trim($current_uri, '/');
?>
<header>
    <a href="<?= BASE_URL ?>" class="logo-link">
        <div class="logo">
            <svg width="40" height="40" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <polygon points="50,10 90,30 50,50 10,30" fill="#6366f1"/>
                <polygon points="10,30 50,50 50,90 10,70" fill="#4f46e5"/>
                <polygon points="90,30 50,50 50,90 90,70" fill="#4338ca"/>
            </svg>
            <h1>Cubic <span>Infrastructure</span></h1>
        </div>
    </a>

    <nav>
        <ul>
            <li><a href="<?= BASE_URL ?>" <?= $current_uri === '/' ? 'class="active"' : '' ?>>Accueil</a></li>
            <li><a href="<?= BASE_URL ?>boutique" <?= $current_uri === '/boutique' ? 'class="active"' : '' ?>>Boutique</a></li>
            <li><a href="<?= BASE_URL ?>actualite" <?= $current_uri === '/actualite' ? 'class="active"' : '' ?>>Actualités</a></li>
            <li><a href="<?= BASE_URL ?>classement" <?= $current_uri === '/classement' ? 'class="active"' : '' ?>>Classement</a></li>
            
            <?php if ($user): ?>
                <li class="nav-divider"></li>
                <?php if (Auth::isAdmin()): ?>
                    <li><a href="<?= BASE_URL ?>admin" <?= $current_uri === '/admin' ? 'class="active"' : '' ?>>Admin</a></li>
                <?php endif; ?>
                <li class="user-session">
                    <div class="user-info">
                        <span class="user-credits"><?= $_SESSION['user']['credit'] ?? 0 ?> <small>Crédits</small></span>
                    </div>
                    <a href="<?= BASE_URL ?>profile" class="user-avatar-link <?= $current_uri === '/profile' ? 'active' : '' ?>">
                        <img src="<?= !empty($user['avatar']) ? BASE_URL . 'uploads/' . $user['avatar'] : BASE_URL . 'assets/img/default-avatar.png' ?>" 
                             alt="Profil">
                    </a>
                </li>
                <li><a href="<?= BASE_URL ?>logout" class="logout-link">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="<?= BASE_URL ?>login" class="nav-login-btn">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
