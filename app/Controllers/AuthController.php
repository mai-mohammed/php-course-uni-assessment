<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use App\Models\User;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
        // Render the registration view
        $this->view('register', ['title' => 'Register'], 'signup');
    }

    public function processRegistration()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /register');
            exit;
        }

        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';

        // Validate inputs
        if (empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) {
            $this->view('register', [
                'title' => 'Register',
                'error' => 'All fields are required.'
            ], 'signup');
            return;
        }

        if ($password !== $passwordConfirm) {
            $this->view('register', [
                'title' => 'Register',
                'error' => 'Passwords do not match.'
            ], 'signup');
            return;
        }

        // Check if username already exists
        if (User::findByUsername($username)) {
            $this->view('register', [
                'title' => 'Register',
                'error' => 'Username is already in use.'
            ], 'signup');
            return;
        }

        // Check if email already exists
        if (User::findByEmail($email)) {
            $this->view('register', [
                'title' => 'Register',
                'error' => 'Email is already in use.'
            ], 'signup');
            return;
        }

        // Hash password and create user
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        if (User::create($username, $email, $passwordHash)) {
            header('Location: /login');
            exit;
        } else {
            $this->view('register', [
                'title' => 'Register',
                'error' => 'An error occurred. Please try again.'
            ], 'signup');
        }
    }


    // Display the login form
    public function showLoginForm()
    {
        $this->view('login', ['title' => 'Login'], 'login');
    }

    // Process the login form
    public function processLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login');
            exit;
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validate inputs
        if (empty($email) || empty($password)) {
            $this->view('login', [
                'title' => 'Login',
                'error' => 'Email and password are required.'
            ], 'login');
            return;
        }

        // Fetch user by email
        $user = User::findByEmail($email);
        if (!$user || !password_verify($password, $user['password_hash'])) {
            $this->view('login', [
                'title' => 'Login',
                'error' => 'Invalid email or password.'
            ], 'login');
            return;
        }

        // Log the user in
        Auth::login($user);
        header('Location: /');
        exit;
    }

    // Logout the user
    public function logout()
    {
        Auth::logout();
        header('Location: /');
        exit;
    }
}
