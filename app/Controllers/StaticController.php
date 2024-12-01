<?php

namespace App\Controllers;

use Core\Controller;

class StaticController extends Controller
{
    public function about()
    {
        $this->view('about', ['title' => 'About Us'], 'about');
    }
}
