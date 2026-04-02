<?php ob_start(); ?>

    <h1>Login</h1>
    <p class="muted">Sign in to manage book records.</p>

<?php if (!empty($error)): ?>
    <div class="error-text"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

    <form action="/login" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="/books" class="btn btn-secondary">Back</a>
        </div>
    </form>

<?php
$content = ob_get_clean();
$title = 'Login';
require __DIR__ . '/../layout.php';