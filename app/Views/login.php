<main>
    <?php if (!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form class="login-form" action="/login/submit" method="POST">
        <div class="input-container">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" required>
        </div>
        <div class="input-container">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        <input type="submit" value="Login" class="submit-button">
    </form>
</main>