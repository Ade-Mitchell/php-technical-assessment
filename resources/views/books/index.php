<?php ob_start(); ?>

    <h1>Books</h1>

    <p><a href="/books/create">Add Book</a></p>

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

                <a href="/books/edit?id=<?= $book['id'] ?>">Edit</a>

                <form action="/books/delete" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= htmlspecialchars((string) $book['id']) ?>">
                    <button type="submit" onclick="return confirm('Delete this book?')">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php
$content = ob_get_clean();
$title = 'Books';
require __DIR__ . '/../layout.php';