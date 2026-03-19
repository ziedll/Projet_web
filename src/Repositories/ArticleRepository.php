<?php
namespace App\Repositories;

use App\Core\Database;

class ArticleRepository extends BaseRepository {
    protected $table = 'article';

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM article ORDER BY date_de_creation DESC");
        return $stmt->fetchAll();
    }

    public function getLatest($limit = 3) {
        return $this->db->query("SELECT * FROM article ORDER BY date_de_creation DESC LIMIT " . (int)$limit)->fetchAll();
    }

    public function save($data, $id = null) {
        if ($id) {
            if (isset($data['image'])) {
                $stmt = $this->db->prepare("UPDATE article SET titre = ?, content = ?, image = ? WHERE id = ?");
                return $stmt->execute([$data['titre'], $data['content'], $data['image'], $id]);
            } else {
                $stmt = $this->db->prepare("UPDATE article SET titre = ?, content = ? WHERE id = ?");
                return $stmt->execute([$data['titre'], $data['content'], $id]);
            }
        } else {
            $stmt = $this->db->prepare("INSERT INTO article (titre, content, image) VALUES (?, ?, ?)");
            return $stmt->execute([$data['titre'], $data['content'], $data['image'] ?? null]);
        }
    }
}
