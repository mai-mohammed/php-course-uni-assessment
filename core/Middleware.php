<?php

namespace Core;

class Middleware
{
    public static function adminOnly()
    {
        if (!Auth::isAdmin()) {
            header('Location: /');
            exit;
        }
    }
}
