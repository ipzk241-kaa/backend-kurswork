<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Auth;
use App\Models\News;

class NewsController extends BaseController
{
    public function index()
    {
        $model = new News();
        $newsList = $model->getAll();
        $this->view('news/index', ['title' => 'Новини', 'newsList' => $newsList]);
    }

    public function show($id)
    {
        $model = new News();
        $news = $model->getById($id);
        $images = $model->getImages($id);
        $this->view('news/show', ['title' => $news['title'], 'news' => $news, 'images' => $images]);
    }

    public function create()
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $this->view('news/create', ['title' => 'Додати новину']);
    }

    public function store()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $imageLinks = $_POST['image_links'] ?? '';

        $model = new News();
        $newsId = $model->create($title, $content, $date);

        if (!empty($_FILES['images'])) {
            foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
                $fileName = $_FILES['images']['name'][$index] ?? '';
                $fileError = $_FILES['images']['error'][$index] ?? UPLOAD_ERR_NO_FILE;
                if ($fileName && $fileError === UPLOAD_ERR_OK) {
                    $filename = uniqid() . '_' . $fileName;
                    $targetPath = 'public/assets/news/' . $filename;
                    move_uploaded_file($tmpName, $targetPath);
                    $model->addImage($newsId, $filename);
                }
            }
        }

        if (!empty($imageLinks)) {
            $links = explode(',', $imageLinks);
            foreach ($links as $link) {
                $link = trim($link);
                if (filter_var($link, FILTER_VALIDATE_URL)) {
                    $imgContent = @file_get_contents($link);
                    if ($imgContent) {
                        $ext = pathinfo(parse_url($link, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                        $name = uniqid('url_') . '.' . $ext;
                        file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/news/$name", $imgContent);

                        $model->addImage($newsId, $name);
                    }
                }
            }
        }
        header('Location: /news');
    }

    public function edit($id)
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $model = new News();
        $news = $model->getById($id);
        $images = $model->getImages($id);
        $this->view('news/edit', ['title' => 'Редагувати новину', 'news' => $news, 'images' => $images]);
    }

    public function update($id)
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $date = $_POST['date'] ?? date('Y-m-d');

        $model = new News();
        $model->update($id, $title, $content, $date);

        if (!empty($_FILES['images'])) {
            foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
                if ($_FILES['images']['error'][$index] === UPLOAD_ERR_OK) {
                    $filename = uniqid() . '_' . $_FILES['images']['name'][$index];
                    $targetPath = 'public/assets/news/' . $filename;
                    move_uploaded_file($tmpName, $targetPath);
                    $model->addImage($id, $filename);
                }
            }
        }

        header('Location: /news');
    }

    public function delete($id)
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $model = new News();
        $model->delete($id);
        header('Location: /news');
    }

    public function deleteImage($imageId)
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            exit('Доступ заборонено');
        }

        $model = new News();
        $model->deleteImage($imageId);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
