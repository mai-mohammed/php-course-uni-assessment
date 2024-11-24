<?php

use Core\Auth;

// Check user login state
$user = Auth::user();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">

    <!-- Global Styles -->
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/popup.css">
    <link rel="stylesheet" href="/css/media.css">

    <!-- View-Specific Styles -->
    <?php if (!empty($cssPath)): ?>
        <link rel="stylesheet" href="<?= $cssPath ?>">
    <?php endif; ?>

    <title><?= $title ?? 'Online Store' ?></title>
</head>

<body>

    <header>
        <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
        <nav class="drop-down-menu">
            <ul id="menu-list">
                <li>Shop</li>
                <li>Mens</li>
                <li>Women</li>
                <li>About</li>
            </ul>
        </nav>

        <a href="/" class="logo left-logo"><i class="fa-solid fa-spa"></i><span>SHOP'X</span></a>
        <nav class="center-nav-pages">
            <ul>
                <li>Shop</li>
                <li>Mens</li>
                <li>Women</li>
                <li>About</li>
            </ul>
        </nav>
        <a href="/" class="logo center-logo"><i class="fa-solid fa-spa"></i><span>SHOP'X</span></a>
        <div class="user-part">
            <?php if ($user): ?>
                <div class="user-dropdown">
                    <i class="fa-solid fa-circle-user user-icon" onclick="toggleDropdown(this)"></i>
                    <div class="dropdown-menu">
                        <p class="user-detail"><strong>Username:</strong> <?= htmlspecialchars($user['username']); ?></p>
                        <p class="user-detail"><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                        <a href="/logout" class="dropdown-logout">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="/login" class="login-button">Login</a>
                <a href="/register" class="signup-button">Sign Up</a>
            <?php endif; ?>
        </div>
    </header>

    <script src="/js/script.js"></script>
</body>

</html>