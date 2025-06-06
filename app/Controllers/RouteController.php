<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Auth;
use App\Models\Route;

class RouteController extends BaseController
{
    public function index()
    {
        $model = new Route();
        $routes = $model->getAll();
        $this->view('routes/index', ['title' => 'Маршрути', 'routes' => $routes]);
    }

    public function admin()
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $model = new Route();
        $routes = $model->getAll();
        $this->view('routes/admin', ['title' => 'Адмінка маршрутів', 'routes' => $routes]);
    }

    public function create()
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $this->view('routes/create', ['title' => 'Новий маршрут']);
    }

    public function store()
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
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

        header('Location: /routes/admin');
    }

    public function edit($id)
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $model = new Route();
        $route = $model->find($id);

        $this->view('routes/edit', ['title' => 'Редагування маршруту', 'route' => $route]);
    }

    public function update($id)
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
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

        header('Location: /routes/admin');
    }

    public function delete($id)
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $model = new Route();
        $model->delete($id);

        header('Location: /routes/admin');
    }
}
