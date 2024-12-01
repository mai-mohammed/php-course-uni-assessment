<?php

namespace App\Models;

use Core\Database;
use PDO;

class Product
{
    // Fetch all products
    public static function getAll()
    {
        $db = Database::getConnection();
        $stmt = $db->query("
            SELECT Products.id, Products.name, Products.description, Products.price, Products.image_url, Categories.name AS category
            FROM Products
            LEFT JOIN Categories ON Products.category_id = Categories.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch a single product by ID
    public static function getById($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            SELECT Products.id, Products.name, Products.description, Products.price, Products.image_url, Products.initial_stock,  Categories.name AS category
            FROM Products
            LEFT JOIN Categories ON Products.category_id = Categories.id
            WHERE Products.id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get aggregated statistics
    public static function getStatistics()
    {
        return [
            'total_products' => self::getTotalProducts(),
            'total_categories' => self::getTotalCategories(),
            'total_orders' => self::getTotalOrders(),
            'total_revenue' => self::getTotalRevenue(),
            'top_selling_products' => self::getTopSellingProducts(),
        ];
    }

    // Get total number of products
    public static function getTotalProducts()
    {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT COUNT(*) AS total FROM Products");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    // Get total number of categories
    public static function getTotalCategories()
    {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT COUNT(*) AS total FROM Categories");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    // Get total number of orders
    public static function getTotalOrders()
    {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT COUNT(*) AS total FROM Orders");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    // Get total revenue
    public static function getTotalRevenue()
    {
        $db = Database::getConnection();
        $stmt = $db->query("
            SELECT COALESCE(SUM(Order_Items.quantity * Order_Items.price_at_purchase), 0) AS total_revenue
            FROM Order_Items
        ");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_revenue'];
    }

    // Get top 5 selling products
    public static function getTopSellingProducts()
    {
        $db = Database::getConnection();
        $stmt = $db->query("
            SELECT 
                Products.name,
                COALESCE(SUM(Order_Items.quantity), 0) AS total_sold
            FROM Products
            LEFT JOIN Order_Items ON Products.id = Order_Items.product_id
            GROUP BY Products.id, Products.name
            ORDER BY total_sold DESC
            LIMIT 5
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
