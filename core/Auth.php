<?php

namespace Core;
use App\Models\User;

class Auth
{
    public static function check()
    {
        return isset($_SESSION['user']);
    }

    public static function login($user)
    {
        // Fetch user roles from the database
        $roles = User::getRolesByUserId($user['id']);
        // Store user and roles in the session
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'roles' => $roles
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

    public static function isAdmin()
    {
        $user = self::user();
        return $user && in_array('Admin', $user['roles']);
    }
}
