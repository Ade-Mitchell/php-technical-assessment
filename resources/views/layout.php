<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'App') ?></title>
    <link rel="stylesheet" href="/build/assets/app.css">
</head>
<body>

<nav>
    <a href="/books">Books</a>
    |
    <a href="/login">Login</a>

    <?php if (!empty($_SESSION['user'])): ?>
        |
        Logged in as <?= htmlspecialchars($_SESSION['user']['username']) ?>

        <form action="/logout" method="POST" style="display:inline;">
            <button type="submit">Logout</button>
        </form>
    <?php endif; ?>
</nav>

<hr>

<?= $content ?? '' ?>

<script type="module" src="/build/assets/app.js"></script>
</body>
</html>