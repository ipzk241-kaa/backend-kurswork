<?php
namespace App\Models;

use App\Core\Model;

class Review extends Model
{
    public function getApproved()
    {
        $stmt = $this->db->query("SELECT * FROM reviews WHERE approved = 1 ORDER BY created_at DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM reviews ORDER BY created_at DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM reviews WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($userName, $text, $image = null)
    {
        $stmt = $this->db->prepare("INSERT INTO reviews (user_name, text, image) VALUES (?, ?, ?)");
        $stmt->execute([$userName, $text, $image]);
    }

    public function update($id, $userName, $text, $image = null)
    {
        if ($image) {
            $stmt = $this->db->prepare("UPDATE reviews SET user_name = ?, text = ?, image = ? WHERE id = ?");
            $stmt->execute([$userName, $text, $image, $id]);
        } else {
            $stmt = $this->db->prepare("UPDATE reviews SET user_name = ?, text = ? WHERE id = ?");
            $stmt->execute([$userName, $text, $id]);
        }
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM reviews WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function approve($id)
    {
        $stmt = $this->db->prepare("UPDATE reviews SET approved = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }
}
