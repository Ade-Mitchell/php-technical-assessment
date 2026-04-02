<?php ob_start(); ?>

    <h1>Books</h1>

    <p><a href="/books/create">Add Book</a></p>

    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <?= htmlspecialchars($book['title']) ?>
                -
                <a href="/books/edit?id=<?= $book['id'] ?>">Edit</a>
            </li>
        <?php endforeach; ?>
    </ul>

<?php
$content = ob_get_clean();
$title = 'Books';
require __DIR__ . '/../layout.php';