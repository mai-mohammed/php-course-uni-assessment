<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Product;
use Core\Middleware;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Middleware::adminOnly();
    }
    public function index()
    {
        $statistics = Product::getStatistics();
        $this->view('admin/index', ['title' => 'Admin Panel', 'statistics' => $statistics], 'admin');
    }

    public function listProducts()
    {
        $products = Product::getAll();
        $this->view('admin/products', ['title' => 'Products', 'products' => $products], 'admin');
    }

    public function productDetails($id)
    {
        $product = Product::getById($id);
        if (!$product) {
            header('Location: /admin-panel/products');
            exit;
        }
        $this->view('admin/product-details', ['title' => 'Product Details', 'product' => $product], 'admin');
    }
}
