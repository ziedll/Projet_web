<?php
namespace App\Repositories;

class PurchaseRepository extends BaseRepository {
    protected $table = 'purchase_history';

    public function add($userId, $itemId, $itemName, $price) {
        $stmt = $this->db->prepare("INSERT INTO purchase_history (user_id, item_id, item_name, price) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$userId, $itemId, $itemName, $price]);
    }

    public function getByUserId($userId) {
        $stmt = $this->db->prepare("SELECT * FROM purchase_history WHERE user_id = ? ORDER BY purchase_date DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}
