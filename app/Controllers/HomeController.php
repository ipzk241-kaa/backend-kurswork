<?php
namespace App\Controllers;

use App\Core\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->view('home/index', ['title' => 'Головна сторінка']);
    }
    public function about()
    {
         $this->view('home/about', ['title' => 'Про нас']);
    }
}
