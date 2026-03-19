<?php
namespace App\Controllers;

use App\Repositories\ArticleRepository;

class ActualiteController extends Controller {
    public function index() {
        $articleRepo = new ArticleRepository();
        
        $articleId = $_GET['id'] ?? null;
        if ($articleId) {
            $article = $articleRepo->getById((int)$articleId);
            if ($article) {
                return $this->render('actualite_detail', [
                    'article' => $article,
                    'title' => $article['titre'] . ' - Actualités'
                ]);
            }
        }

        $articles = $articleRepo->getAll();
        $this->render('actualite', [
            'articles' => $articles,
            'title' => 'Actualités - Cubic Infrastructure'
        ]);
    }
}
