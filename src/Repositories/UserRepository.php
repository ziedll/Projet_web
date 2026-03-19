<?php
namespace App\Repositories;

use App\Core\Database;

class UserRepository extends BaseRepository {
    protected $table = 'user';

    public function getAll() {
        return $this->db->query("SELECT * FROM user ORDER BY pseudo ASC")->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO user (pseudo, email, mdp) VALUES (?, ?, ?)");
        return $stmt->execute([$data['pseudo'], $data['email'], $data['mdp']]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE user SET pseudo = ?, email = ?, role = ?, credit = ? WHERE id = ?");
        return $stmt->execute([$data['pseudo'], $data['email'], $data['role'], $data['credit'], $id]);
    }

    public function updateProfile($id, $data) {
        $stmt = $this->db->prepare("UPDATE user SET 
            avatar = COALESCE(?, avatar), 
            description = ?, 
            discord = ?, 
            twitter = ?, 
            youtube = ? 
            WHERE id = ?");
        return $stmt->execute([
            $data['avatar'] ?? null, 
            $data['description'], 
            $data['discord'], 
            $data['twitter'], 
            $data['youtube'], 
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM user WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function updateCredit($id, $amount) {
        $stmt = $this->db->prepare("UPDATE user SET credit = credit + ? WHERE id = ?");
        return $stmt->execute([$amount, $id]);
    }

    public function getLeaderboard() {
        return $this->db->query("SELECT pseudo, credit, avatar, role FROM user ORDER BY credit DESC")->fetchAll();
    }

    public function getFreshData($id) {
        $stmt = $this->db->prepare("SELECT role, credit FROM user WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
