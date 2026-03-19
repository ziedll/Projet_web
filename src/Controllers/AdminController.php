<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Repositories\ArticleRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class AdminController extends Controller {
    private $articleRepo;
    private $productRepo;
    private $userRepo;

    public function __construct() {
        Auth::requireAdmin();
        $this->articleRepo = new ArticleRepository();
        $this->productRepo = new ProductRepository();
        $this->userRepo = new UserRepository();
    }

    public function index() {
        $section = $_GET['section'] ?? 'articles';
        $message = $_GET['msg'] ?? "";
        
        $data = [
            'section' => $section,
            'message' => $message,
            'title' => 'Administration - Cubic Infrastructure',
            'articles' => $this->articleRepo->getAll(),
            'products' => $this->productRepo->getAll(),
            'users' => $this->userRepo->getAll()
        ];

        
        if (isset($_GET['edit'])) {
            $id = (int)$_GET['edit'];
            if ($section === 'articles') $data['article_to_edit'] = $this->articleRepo->getById($id);
            if ($section === 'boutique') $data['product_to_edit'] = $this->productRepo->getById($id);
            if ($section === 'users') $data['user_to_edit'] = $this->userRepo->getById($id);
        }

        $this->render('admin', $data);
    }

    public function handleArticle() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $data = ['titre' => $_POST['titre'], 'content' => $_POST['content']];
            $image = $this->handleUpload($_FILES['image']);
            if ($image) $data['image'] = $image;

            $this->articleRepo->save($data, $id);
            $section = 'articles';
            $msg = $id ? "Mis à jour !" : "Ajouté !";
            $this->redirect(BASE_URL . 'admin?section=' . $section . '&msg=' . urlencode($msg));
        }
    }

    public function deleteArticle() {
        $id = (int)$_GET['id'];
        $this->articleRepo->delete($id);
        $this->redirect(BASE_URL . 'admin?section=articles&msg=Supprimé');
    }

    public function handleProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $data = [
                'titre' => $_POST['titre'],
                'prix' => $_POST['prix'],
                'description' => $_POST['description'],
                'quantite' => $_POST['quantite']
            ];
            $image = $this->handleUpload($_FILES['image']);
            if ($image) $data['image'] = $image;

            $this->productRepo->save($data, $id);
            $this->redirect(BASE_URL . 'admin?section=boutique&msg=' . urlencode($id ? "Mis à jour !" : "Ajouté !"));
        }
    }

    public function deleteProduct() {
        $id = (int)$_GET['id'];
        $this->productRepo->delete($id);
        $this->redirect(BASE_URL . 'admin?section=boutique&msg=Supprimé');
    }

    public function handleUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $data = [
                'pseudo' => $_POST['pseudo'],
                'email' => $_POST['email'],
                'role' => $_POST['role'],
                'credit' => (int)$_POST['credit']
            ];
            if (!$id && !empty($_POST['mdp'])) {
                $data['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            }

            if ($id) {
                $this->userRepo->update($id, $data);
            } else {
                $this->userRepo->create($data);
            }
            $this->redirect(BASE_URL . 'admin?section=users&msg=' . urlencode($id ? "Mis à jour !" : "Créé !"));
        }
    }

    public function deleteUser() {
        $id = (int)$_GET['id'];
        $this->userRepo->delete($id);
        $this->redirect(BASE_URL . 'admin?section=users&msg=Supprimé');
    }

    private function handleUpload($file) {
        if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $extension;
            if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) return $filename;
        }
        return null;
    }
}
