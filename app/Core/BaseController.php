<?php
namespace App\Core;

class BaseController
{
    protected function view($view, $data = [])
    {
        extract($data);
        ob_start();
        require_once __DIR__ . "/../Views/{$view}.php";
        $content = ob_get_clean();
        require_once __DIR__ . "/../Views/layout.php";
    }
    protected function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
