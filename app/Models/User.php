<?php

namespace App\Models;

use Core\Database;
use PDO;

class User
{
    // Create a new user
    public static function create($username, $email, $passwordHash)
    {
        $db = Database::getConnection();

        try {
            $stmt = $db->prepare("
                INSERT INTO Users (username, email, password_hash)
                VALUES (:username, :email, :password_hash)
            ");

            $stmt->execute([
                'username' => $username,
                'email' => $email,
                'password_hash' => $passwordHash,
            ]);

            return true;
        } catch (\PDOException $e) {
            if ($e->getCode() === '23000') { // Unique constraint violation
                return false;
            }
            throw $e; // Re-throw other exceptions
        }
    }


    // Fetch a user by email
    public static function findByEmail($email)
    {
        $db = Database::getConnection();

        $stmt = $db->prepare("SELECT * FROM Users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fetch a user by ID (optional for session validation)
    public static function findById($id)
    {
        $db = Database::getConnection();

        $stmt = $db->prepare("SELECT * FROM Users WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Check if a username exists
    public static function findByUsername($username)
    {
        $db = Database::getConnection();

        $stmt = $db->prepare("SELECT * FROM Users WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getRolesByUserId($userId)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            SELECT r.role_name 
            FROM Roles r
            INNER JOIN User_Roles ur ON r.id = ur.role_id
            WHERE ur.user_id = :user_id
        ");
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN); // Returns an array of role names
    }
}
