<?php
namespace App\Controllers;

use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use App\Core\Auth;

class BoutiqueController extends Controller {
    public function index() {
        $productRepo = new ProductRepository();
        $userRepo = new UserRepository();
        $products = $productRepo->getAll();
        
        $message = $_GET['msg'] ?? "";
        
        $this->render('boutique', [
            'products' => $products,
            'message' => $message,
            'title' => 'Boutique - Cubic Infrastructure'
        ]);
    }

    public function buy() {
        Auth::requireLogin();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_item'])) {
            $itemId = (int)$_POST['item_id'];
            $productRepo = new ProductRepository();
            $userRepo = new UserRepository();
            
            $product = $productRepo->getById($itemId);
            $user = Auth::getUser();
            $userData = $userRepo->getById($user['id']);

            if ($product && $userData['credit'] >= $product['prix']) {
                $userRepo->updateCredit($user['id'], -$product['prix']);
                
                
                $_SESSION['user']['credit'] -= $product['prix'];
                
                
                $purchaseRepo = new \App\Repositories\PurchaseRepository();
                $purchaseRepo->add($user['id'], $itemId, $product['titre'], $product['prix']);
                
                $msg = "Achat réussi : " . $product['titre'];
            } else {
                $msg = "Erreur lors de l'achat (crédits insuffisants).";
            }
            $this->redirect(BASE_URL . 'boutique?msg=' . urlencode($msg));
        }
    }
}
