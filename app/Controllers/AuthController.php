<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
    public function login()
    {
        $this->view('auth/login', ['title' => 'Вхід']);
    }

    public function handleLogin()
    {
        session_start();
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
            ];
            header('Location: /');
        } else {
            $this->view('auth/login', ['title' => 'Вхід', 'error' => 'Невірні дані']);
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }

    public function register()
{
    $this->view('auth/register', ['title' => 'Реєстрація']);
}

public function handleRegister()
{
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = 'user';

    if (strlen($username) < 3 || strlen($password) < 4) {
        $this->view('auth/register', ['title' => 'Реєстрація', 'error' => 'Некоректні дані']);
        return;
    }

    $userModel = new \App\Models\User();
    $existing = $userModel->findByUsername($username);
    if ($existing) {
        $this->view('auth/register', ['title' => 'Реєстрація', 'error' => 'Користувач вже існує']);
        return;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $userModel->create($username, $passwordHash, $role);

    header('Location: /login');
}

}
