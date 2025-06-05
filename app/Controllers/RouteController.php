<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Models\Route;

class RouteController extends BaseController
{
    public function index()
    {
        $model = new Route();
        $routes = $model->getAll();
        $this->view('routes/index', ['routes' => $routes]);
    }
}
