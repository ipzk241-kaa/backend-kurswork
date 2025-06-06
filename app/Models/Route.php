<?php
namespace App\Models;

use App\Core\Model;

class Route extends Model
{
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM routes ORDER BY id DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM routes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO routes (title, description, image, duration, price) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['title'],
            $data['description'],
            $data['image'],
            $data['duration'],
            $data['price']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE routes SET title = ?, description = ?, image = ?, duration = ?, price = ? WHERE id = ?");
        $stmt->execute([
            $data['title'],
            $data['description'],
            $data['image'],
            $data['duration'],
            $data['price'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM routes WHERE id = ?");
        $stmt->execute([$id]);
    }
}
