<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;

// Auto-detect base path for assets and routing
$basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
if ($basePath !== '/') $basePath .= '/';
define('BASE_URL', $basePath);

$router = new Router();

// Define routes
$router->add('/', 'HomeController', 'index');
$router->add('/index.php', 'HomeController', 'index');
$router->add('/boutique', 'BoutiqueController', 'index');
$router->add('/boutique/buy', 'BoutiqueController', 'buy');
$router->add('/actualite', 'ActualiteController', 'index');
$router->add('/login', 'AuthController', 'login');
$router->add('/register', 'AuthController', 'register');
$router->add('/logout', 'AuthController', 'logout');
$router->add('/classement', 'LeaderboardController', 'index');
$router->add('/admin', 'AdminController', 'index');
$router->add('/admin/article/save', 'AdminController', 'handleArticle');
$router->add('/admin/article/delete', 'AdminController', 'deleteArticle');
$router->add('/admin/product/save', 'AdminController', 'handleProduct');
$router->add('/admin/product/delete', 'AdminController', 'deleteProduct');
$router->add('/admin/user/save', 'AdminController', 'handleUser');
$router->add('/admin/user/delete', 'AdminController', 'deleteUser');

// Profile & Extranet
$router->add('/profile', 'ProfileController', 'index');
$router->add('/profile/update', 'ProfileController', 'update');
$router->add('/history', 'ProfileController', 'history');

// Run the router
$router->run();