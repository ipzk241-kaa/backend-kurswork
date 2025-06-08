<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Models\Gallery;
use App\Core\Auth;

class GalleryController extends BaseController
{
    private function clearGalleryCaches()
    {
        $cache = new \App\Core\Cache();
        $cache->delete('gallery_index_page');
        $cache->delete('gallary_admin_page');
    }
    public function index()
    {
        $model = new Gallery();
        $images = $model->getAll();
        $this->view('gallery/index', ['title' => 'Галерея', 'images' => $images], 'gallery_index_page');
    }
    public function admin()
    {
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $model = new Gallery();
        $images = $model->getAll();
        $this->view('gallery/admin', ['title' => 'Адмінка галереї', 'images' => $images], 'gallery_admin_page');
    }
    public function create()
    {
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $this->view('gallery/create', ['title' => 'Додати зображення']);
    }

    public function store()
    {
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
            $imagePath = '';

            if (!empty($_POST['image_url'])) {
                $url = $_POST['image_url'];
                $ext = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
                $uniqueName = uniqid('img_') . '.' . $ext;
                $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/' . $uniqueName;

                if (@copy($url, $targetPath)) {
                    $imagePath = $uniqueName;
                }
            }

            if (!empty($_FILES['image_file']['name'])) {
                $ext = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
                $uniqueName = uniqid('img_') . '.' . $ext;
                $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/' . $uniqueName;

                if (move_uploaded_file($_FILES['image_file']['tmp_name'], $targetPath)) {
                    $imagePath = $uniqueName;
                }
            }

            if ($imagePath) {
                $model = new Gallery();
                $model->create($title, $imagePath);
                header('Location: /gallery/admin');
                $this->clearGalleryCaches();
                exit;
            }
        }
        $this->clearGalleryCaches();
        $this->view('gallery/create', ['title' => 'Додати зображення', 'error' => 'Помилка під час завантаження']);
        header("Location: /gallery/admin");
    }
    public function edit($id)
    {
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $model = new Gallery();
        $item = $model->find($id);
        $this->view('gallery/edit', ['title' => 'Редагування зображення', 'item' => $item]);
    }

    public function update($id){
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $model = new Gallery();
        $item = $model->find($id);
        $title = $_POST['title'] ?? $item['title'];
        $imagePath = $item['image_path'];

        if (!empty($_POST['image_url'])) {
            $ext = pathinfo(parse_url($_POST['image_url'], PHP_URL_PATH), PATHINFO_EXTENSION);
            $uniqueName = uniqid('img_') . '.' . $ext;
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/' . $uniqueName;

            if (@copy($_POST['image_url'], $targetPath)) {
                if (file_exists("public/assets/img/" . $imagePath)) {
                    unlink("public/assets/img/" . $imagePath);
                }
                $imagePath = $uniqueName;
            }
        }

        if (!empty($_FILES['image_file']['name'])) {
            $ext = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
            $uniqueName = uniqid('img_') . '.' . $ext;
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/' . $uniqueName;

            if (move_uploaded_file($_FILES['image_file']['tmp_name'], $targetPath)) {
                if (file_exists("public/assets/img/" . $imagePath)) {
                    unlink("public/assets/img/" . $imagePath);
                }
                $imagePath = $uniqueName;
            }
        }

        $model->update($id, $title, $imagePath);
        $this->clearGalleryCaches();
        header("Location: /gallery/admin");
    }
    public function delete($id)
    {
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $model = new Gallery();
        $item = $model->find($id);
        if ($item && file_exists('public/assets/img/' . $item['image_path'])) {
            unlink('public/assets/img/' . $item['image_path']);
        }

        $model->delete($id);
        $this->clearGalleryCaches();
        header('Location: /gallery/admin');
    }
    public function loadMore()
    {
        $limit = 12;
        $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

        $model = new \App\Models\Gallery();
        $images = $model->getPaginated($limit, $offset);

        header('Content-Type: application/json');
        echo json_encode($images);
        exit;
    }
}
