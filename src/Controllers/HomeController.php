<?php
namespace App\Controllers;

use App\Repositories\ArticleRepository;

class HomeController extends Controller {
    public function index() {
        $articleRepo = new ArticleRepository();
        $articles = $articleRepo->getLatest(3);
        
        $msg = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
            
            $msg = "Merci pour votre message ! Nous vous répondrons dès que possible.";
        }

        $this->render('home', [
            'articles' => $articles,
            'contact_msg' => $msg,
            'title' => 'Accueil - Cubic Infrastructure Group'
        ]);
    }
}
