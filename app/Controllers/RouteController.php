<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Auth;
use App\Models\Route;

class RouteController extends BaseController
{
    private function clearRouteCaches(){
        $cache = new \App\Core\Cache();
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
            'image' => $_POST['image'] ?? '',
            'duration' => $_POST['duration'] ?? '',
            'price' => $_POST['price'] ?? 0,
        ];

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
            'image' => $_POST['image'] ?? '',
            'duration' => $_POST['duration'] ?? '',
            'price' => $_POST['price'] ?? 0,
        ];

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
