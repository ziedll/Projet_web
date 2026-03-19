<?php
namespace App\Repositories;

use App\Core\Database;
use App\Repositories\BaseRepository; // Assuming BaseRepository is in the same namespace or needs to be imported

class ProductRepository extends BaseRepository {
    protected $table = 'boutique';

    // The constructor, getAll, and delete methods are now handled by BaseRepository.
    // If getById in BaseRepository is generic, this specific implementation might be redundant.
    // However, the instruction snippet explicitly includes it, so we'll keep it as provided.
    public function save($data, $id = null) {
        if ($id) {
            if (isset($data['image'])) {
                $stmt = $this->db->prepare("UPDATE boutique SET titre = ?, prix = ?, description = ?, quantite = ?, image = ? WHERE id = ?");
                return $stmt->execute([$data['titre'], $data['prix'], $data['description'], $data['quantite'], $data['image'], $id]);
            } else {
                $stmt = $this->db->prepare("UPDATE boutique SET titre = ?, prix = ?, description = ?, quantite = ? WHERE id = ?");
                return $stmt->execute([$data['titre'], $data['prix'], $data['description'], $data['quantite'], $id]);
            }
        } else {
            $stmt = $this->db->prepare("INSERT INTO boutique (titre, prix, description, quantite, image) VALUES (?, ?, ?, ?, ?)");
            return $stmt->execute([$data['titre'], $data['prix'], $data['description'], $data['quantite'], $data['image'] ?? null]);
        }
    }

    public function updateQuantity($id, $newQuantity) {
        $stmt = $this->db->prepare("UPDATE boutique SET quantite = ? WHERE id = ?");
        return $stmt->execute([$newQuantity, $id]);
    }

    public function reduceStock($id, $quantity) {
        $stmt = $this->db->prepare("UPDATE boutique SET quantite = quantite - ? WHERE id = ?");
        return $stmt->execute([$quantity, $id]);
    }
}
