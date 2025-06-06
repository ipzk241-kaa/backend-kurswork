<?php
namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($username, $passwordHash, $role = 'user')
{
    $stmt = $this->db->prepare("INSERT INTO users (username, password_hash, role) VALUES (?, ?, ?)");
    $stmt->execute([$username, $passwordHash, $role]);
}
}
