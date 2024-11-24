<?php

namespace Core;

class Auth
{
    public static function check()
    {
        return isset($_SESSION['user']);
    }

    public static function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
        ];
    }
    

    public static function logout()
    {
        unset($_SESSION['user']);
    }

    public static function user()
    {
        return $_SESSION['user'] ?? null;
    }
}
