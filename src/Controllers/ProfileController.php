<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Repositories\UserRepository;
use App\Repositories\PurchaseRepository;

class ProfileController extends Controller {
    private $userRepo;
    private $purchaseRepo;

    public function __construct() {
        Auth::requireLogin();
        $this->userRepo = new UserRepository();
        $this->purchaseRepo = new PurchaseRepository();
    }

    public function index() {
        $user = Auth::getUser();
        $userData = $this->userRepo->getById($user['id']);
        
        $this->render('profile', [
            'user' => $userData,
            'title' => 'Mon Profil - ' . $userData['pseudo']
        ]);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = Auth::getUser();
            $data = [
                'description' => $_POST['description'] ?? '',
                'discord' => $_POST['discord'] ?? '',
                'twitter' => $_POST['twitter'] ?? '',
                'youtube' => $_POST['youtube'] ?? ''
            ];

            // Handle Avatar Upload
            $avatar = $this->handleAvatarUpload($_FILES['avatar']);
            if ($avatar) $data['avatar'] = $avatar;

            $this->userRepo->updateProfile($user['id'], $data);
            
            // Sync session
            $freshUser = $this->userRepo->getById($user['id']);
            $_SESSION['user'] = $freshUser;
            
            $this->redirect(BASE_URL . 'profile?msg=Profil mis à jour !');
        }
    }

    public function history() {
        $user = Auth::getUser();
        $history = $this->purchaseRepo->getByUserId($user['id']);
        
        $this->render('history', [
            'history' => $history,
            'title' => 'Historique de mes actions'
        ]);
    }

    private function handleAvatarUpload($file) {
        if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../uploads/avatars/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $extension;
            if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) return 'avatars/' . $filename;
        }
        return null;
    }
}
