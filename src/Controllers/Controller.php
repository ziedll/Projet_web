<?php
namespace App\Controllers;

use App\Core\Auth;

abstract class Controller {
    protected function render($view, $data = []) {
        extract($data);
        Auth::startSession();
        
        ob_start();
        require_once __DIR__ . '/../../templates/pages/' . $view . '.php';
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../../templates/layout.php';
    }

    protected function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
}
