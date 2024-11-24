<?php

namespace Core;

class Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function view($view, $data = [], $cssFile = null)
    {
        extract($data);
        $cssPath = $cssFile ? "/css/{$cssFile}.css" : null;
        require_once "../app/Views/templates/header.php";
        require_once "../app/Views/{$view}.php";
        require_once "../app/Views/templates/footer.php";
    }
}
