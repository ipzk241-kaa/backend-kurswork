<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Models\Contact;
use App\Core\Auth;

class ContactController extends BaseController
{
    public function form()
    {
        $this->view('contacts/form', ['title' => 'Зворотній зв’язок']);
    }

    public function send()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';

        if (strlen($name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($message) < 5) {
            $this->json(['error' => 'Некоректно заповнено форму']);
            return;
        }

        $model = new Contact();
        $model->create($name, $email, $message);
        $this->json(['success' => 'Повідомлення надіслано!']);
     /*$adminEmail = "ipzk241_kaa@student.ztu.edu.ua";
        $subject = "Нове повідомлення з сайту";
        $body = "Ім’я: $name\nEmail: $email\n\nПовідомлення:\n$message";
        $headers = "From: $email\r\nReply-To: $email";
        mail($adminEmail, $subject, $body, $headers);*/
    }
    public function index()
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            echo "Доступ заборонено";
            return;
        }

        $model = new Contact();
        $messages = $model->all();
        $this->view('contacts/index', ['title' => 'Повідомлення', 'messages' => $messages]);
    }

    public function delete($id)
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            echo "Доступ заборонено";
            return;
        }

        $model = new Contact();
        $model->delete($id);
        header('Location: /contacts/admin');
    }
}
