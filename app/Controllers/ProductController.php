<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::getAll();
        $this->view('products', ['title' => 'Products', 'products' => $products]);
    }

    // Display a single product
    public function show($id)
    {
        $product = Product::getById($id);
        if (!$product) {
            header("HTTP/1.0 404 Not Found");
            echo "Product not found.";
            exit;
        }
        $this->view('product', ['title' => $product['name'], 'product' => $product]);
    }
}
