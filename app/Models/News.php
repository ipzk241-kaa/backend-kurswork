<?php
namespace App\Models;

use App\Core\Model;

class News extends Model
{
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM news ORDER BY date DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($title, $content, $date)
    {
        $stmt = $this->db->prepare("INSERT INTO news (title, content, date) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $date]);
        return $this->db->lastInsertId();
    }

    public function update($id, $title, $content, $date)
    {
        $stmt = $this->db->prepare("UPDATE news SET title = ?, content = ?, date = ? WHERE id = ?");
        $stmt->execute([$title, $content, $date, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM news WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getImages($newsId)
    {
        $stmt = $this->db->prepare("SELECT * FROM news_images WHERE news_id = ?");
        $stmt->execute([$newsId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addImage($newsId, $path)
    {
        $stmt = $this->db->prepare("INSERT INTO news_images (news_id, path) VALUES (?, ?)");
        $stmt->execute([$newsId, $path]);
    }

    public function deleteImage($imageId)
    {
        $stmt = $this->db->prepare("DELETE FROM news_images WHERE id = ?");
        $stmt->execute([$imageId]);
    }
}
