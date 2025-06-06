<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Auth;

class AdminController extends BaseController
{
    public function index()
    {
        if (!Auth::isAdmin()) {
            return $this->forbidden();
        }

        $this->view('admin/index', ['title' => 'Адмін-панель']);
    }
}
