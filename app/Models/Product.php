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
            SELECT Products.id, Products.name, Products.description, Products.price, Products.image_url, Categories.name AS category
            FROM Products
            LEFT JOIN Categories ON Products.category_id = Categories.id
            WHERE Products.id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
