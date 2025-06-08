<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Auth;
use App\Models\Route;
use App\Core\Cache;

class RouteController extends BaseController
{
    private function clearRouteCaches(){
        $cache = new Cache();
        $cache->delete('routes_index_page');
        $cache->delete('routes_admin_page');
    }

    public function index()
    {
        $model = new Route();
        $routes = $model->getAll();
        $this->view('routes/index', ['title' => 'Маршрути', 'routes' => $routes], 'routes_index_page');
    }

    public function admin()
    {
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $model = new Route();
        $routes = $model->getAll();
        $this->view('routes/admin', ['title' => 'Адмінка маршрутів', 'routes' => $routes], 'routes_admin_page');
    }

    public function create()
    {
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $this->view('routes/create', ['title' => 'Новий маршрут']);
    }

    public function store()
    {
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $data = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
            'image' => '',
            'duration' => $_POST['duration'] ?? '',
            'price' => $_POST['price'] ?? 0,
        ];
        if (!empty($_FILES['image_file']['name'])) {
            $ext = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
            $uniqueName = uniqid('img_') . '.' . $ext;
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/routes/' . $uniqueName;

            if (move_uploaded_file($_FILES['image_file']['tmp_name'], $targetPath)) {
                $data['image'] = $uniqueName;
            }
        }elseif (!empty($_POST['image_url'])) {
            $imageUrl = $_POST['image_url'];
            $ext = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            if (in_array(strtolower($ext), $allowed)) {
                $uniqueName = uniqid('img_') . '.' . $ext;
                $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/routes/' . $uniqueName;

                $imageContent = @file_get_contents($imageUrl);
                if ($imageContent !== false && file_put_contents($targetPath, $imageContent)) {
                    $data['image'] = $uniqueName;
                }
            }
        }
        $model = new Route();
        $model->create($data);
        $this->clearRouteCaches();
        header('Location: /routes/admin');
    }

    public function edit($id)
    {   
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $model = new Route();
        $route = $model->find($id);

        $this->view('routes/edit', ['title' => 'Редагування маршруту', 'route' => $route]);
    }

    public function update($id)
    {
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $data = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
            'image' => '',
            'duration' => $_POST['duration'] ?? '',
            'price' => $_POST['price'] ?? 0,
        ];

        if (!empty($_FILES['image_file']['name'])) {
            $ext = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
            $uniqueName = uniqid('img_') . '.' . $ext;
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/routes/' . $uniqueName;

            if (move_uploaded_file($_FILES['image_file']['tmp_name'], $targetPath)) {
                $data['image'] = $uniqueName;
            }
        } elseif (!empty($_POST['image_url'])) {
            $imageUrl = $_POST['image_url'];
            $ext = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            if (in_array(strtolower($ext), $allowed)) {
                $uniqueName = uniqid('img_') . '.' . $ext;
                $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/routes/' . $uniqueName;

                $imageContent = @file_get_contents($imageUrl);
                if ($imageContent !== false && file_put_contents($targetPath, $imageContent)) {
                    $data['image'] = $uniqueName;
                }
            }
        }

        $model = new Route();
        $model->update($id, $data);

        $this->clearRouteCaches();
        header('Location: /routes/admin');
    }

    public function delete($id)
    {
        if (!Auth::isAdmin()) {
        return $this->forbidden();
        }

        $model = new Route();
        $model->delete($id);
        $this->clearRouteCaches();
        header('Location: /routes/admin');
    }
}
