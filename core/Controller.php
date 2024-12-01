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

    /**
     * Render a view with optional data and a CSS file
     *
     * @param string $view     The path to the view file (e.g., 'admin/index')
     * @param array $data      Data to pass to the view
     * @param string|null $cssFile CSS file to include (optional)
     */
    public function view($view, $data = [], $cssFile = null)
    {
        extract($data);
        $cssPath = $cssFile ? "/css/{$cssFile}.css" : null;

        // Adjust the path to handle nested files in 'app/Views'
        $viewPath = "../app/Views/" . str_replace('.', '/', $view) . ".php";

        // Check if the view file exists
        if (!file_exists($viewPath)) {
            die("View file not found: {$viewPath}");
        }

        // Include header, main view, and footer
        require_once "../app/Views/templates/header.php";
        require_once $viewPath;
        require_once "../app/Views/templates/footer.php";
    }
}
