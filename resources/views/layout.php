<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'App') ?></title>
    <link rel="stylesheet" href="/build/assets/app.css">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <div class="brand">
            <a href="/books">PHP Assessment</a>
        </div>

        <nav class="nav">
            <a href="/books">Books</a>
            <a href="/books/create">Add Book</a>

            <?php if (empty($_SESSION['user'])): ?>
                <a href="/login">Login</a>
            <?php else: ?>
                <span class="user-pill">
                        Logged in as <?= htmlspecialchars($_SESSION['user']['username']) ?>
                    </span>

                <form action="/logout" method="POST" class="inline-form">
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            <?php endif; ?>
        </nav>
    </div>
</header>

<main class="container page-content">
    <div class="card">
        <?= $content ?? '' ?>
    </div>
</main>

<script type="module" src="/build/assets/app.js"></script>
</body>
</html>