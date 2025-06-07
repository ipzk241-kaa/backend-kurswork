<?php
namespace App\Core;

class BaseController
{
protected function view($view, $data = [], $cacheKey = null)
    {
        extract($data);

        $cache = new Cache();

        if ($cacheKey && $cached = $cache->get($cacheKey)) {
            echo $cached;
            return;
        }

        ob_start();
        require_once __DIR__ . '/../Views/' . $view . '.php';
        $content = ob_get_clean();

        ob_start();
        require __DIR__ . '/../Views/layout.php';
        $fullHtml = ob_get_clean();
        if ($cacheKey) {
            $cache->set($cacheKey, $fullHtml);
        }

        echo $fullHtml;
    }
    protected function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    protected function forbidden()
    {
        $this->view('errors/403', ['title' => 'Доступ заборонено']);
        http_response_code(403);
    }
    public function notFound()
    {
        http_response_code(404);
        $this->view('errors/404', ['title' => 'Сторінку не знайдено']);
    }

    public function serverError()
    {
        http_response_code(500);
        $this->view('errors/500', ['title' => 'Помилка сервера']);
    }
}
