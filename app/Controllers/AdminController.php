<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Auth;

class AdminController extends BaseController
{
    public function index()
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $this->view('admin/index', ['title' => 'Адмін-панель']);
    }
}
