<?php
namespace App\Models;

use App\Core\Model;

class Route extends Model
{
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM routes");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
