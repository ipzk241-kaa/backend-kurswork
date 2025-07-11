<?php
namespace App\Core;

class Auth
{
    public static function check()
    {
        if (session_status() === PHP_SESSION_NONE) {session_start();}
        return isset($_SESSION['user']);
    }

    public static function user()
    {
        if (session_status() === PHP_SESSION_NONE) {session_start();}
        return $_SESSION['user'] ?? null;
    }

    public static function isAdmin()
    {
        $user = self::user();
        return $user && $user['role'] === 'admin';
    }
}
