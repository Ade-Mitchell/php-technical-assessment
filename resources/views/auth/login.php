<?php ob_start(); ?>

    <h1>Login</h1>

<?php if (!empty($error)): ?>
    <p><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

    <form action="/login" method="POST">
        <div>
            <label>Username</label><br>
            <input type="text" name="username" required>
        </div>

        <br>

        <div>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </div>

        <br>

        <button type="submit">Login</button>
    </form>

<?php
$content = ob_get_clean();
$title = 'Login';
require __DIR__ . '/../layout.php';