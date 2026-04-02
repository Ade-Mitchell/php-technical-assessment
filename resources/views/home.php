<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
<h1>Books from database</h1>

<?php if (empty($books)): ?>
    <p>No books found.</p>
<?php else: ?>
    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <?= htmlspecialchars($book['title']) ?>
                by
                <?= htmlspecialchars($book['author']) ?>
                (<?= htmlspecialchars((string) $book['published_year']) ?>)
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
</body>
</html>