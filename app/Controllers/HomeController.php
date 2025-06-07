<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Models\Review;

class HomeController extends BaseController
{
    public function index()
    {
        $reviewModel = new Review();
        $reviews = $reviewModel->getApproved();
        $this->view('home/index', ['title' => 'Головна сторінка', 'reviews' => $reviews]);
    }
    public function about()
    {
         $this->view('home/about', ['title' => 'Про нас']);
    }
}
