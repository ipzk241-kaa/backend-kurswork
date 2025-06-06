<?php
namespace App\Models;

use App\Core\Model;

class Contact extends Model
{
    public function create($name, $email, $message)
    {
        $stmt = $this->db->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);
    }

    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM contacts ORDER BY sent_at DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
    }
}
