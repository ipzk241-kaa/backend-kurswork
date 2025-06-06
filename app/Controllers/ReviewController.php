<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Auth;
use App\Models\Review;

class ReviewController extends BaseController
{
    public function index()
    {
        $model = new Review();
        $reviews = $model->getApproved();

        $this->view('reviews/index', ['reviews' => $reviews, 'title' => 'Відгуки']);
    }

    public function create()
    {
        $this->view('reviews/create', ['title' => 'Залишити відгук']);
    }

    public function store()
    {
        $userName = $_POST['user_name'] ?? '';
        $text = $_POST['text'] ?? '';

        if ($userName && $text) {
            $model = new Review();
            $model->create($userName, $text);
        }

        header('Location: /reviews');
    }

    // ========== Адмін ==========
    public function admin()
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $model = new Review();
        $reviews = $model->getAll();

        $this->view('reviews/admin', ['reviews' => $reviews, 'title' => 'Адмін - Відгуки']);
    }

    public function approve($id)
    {
        if (!Auth::isAdmin()) exit('403');

        $model = new Review();
        $model->approve($id);
        header('Location: /reviews/admin');
    }

    public function edit($id)
    {
        if (!Auth::isAdmin()) exit('403');

        $model = new Review();
        $review = $model->find($id);

        $this->view('reviews/edit', ['review' => $review, 'title' => 'Редагувати відгук']);
    }

    public function update($id)
    {
        if (!Auth::isAdmin()) exit('403');

        $model = new Review();
        $model->update($id, $_POST['user_name'], $_POST['text']);

        header('Location: /reviews/admin');
    }

    public function delete($id)
    {
        if (!Auth::isAdmin()) exit('403');

        $model = new Review();
        $model->delete($id);
        header('Location: /reviews/admin');
    }
}
