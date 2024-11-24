<main>
    <?php if (!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form class="signup-form" action="/register/submit" method="POST">
        <div class="input-container">
            <label for="username">Username</label>
            <input id="username" type="text" name="username" required>
        </div>
        <div class="input-container">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" required>
        </div>
        <div class="input-container">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div class="input-container">
            <label for="password_confirm">Confirm Password</label>
            <input id="password_confirm" type="password" name="password_confirm" required>
        </div>
        <input type="submit" value="Register" class="submit-button">
    </form>
</main>
