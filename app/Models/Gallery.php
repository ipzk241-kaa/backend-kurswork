<?php
namespace App\Models;

use App\Core\Model;

class Gallery extends Model
{
    public function getAll()
    {
        return $this->db->query("SELECT * FROM gallery ORDER BY created_at DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM gallery WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($title, $imagePath)
    {
        $stmt = $this->db->prepare("INSERT INTO gallery (title, image_path) VALUES (?, ?)");
        $stmt->execute([$title, $imagePath]);
    }

    public function update($id, $title, $imagePath)
    {
        $stmt = $this->db->prepare("UPDATE gallery SET title = ?, image_path = ? WHERE id = ?");
        $stmt->execute([$title, $imagePath, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM gallery WHERE id = ?");
        $stmt->execute([$id]);
    }
    public function getPaginated($limit, $offset)
    {
        $stmt = $this->db->prepare("SELECT * FROM gallery ORDER BY created_at DESC LIMIT ? OFFSET ?");
        $stmt->bindValue(1, (int)$limit, \PDO::PARAM_INT);
        $stmt->bindValue(2, (int)$offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
