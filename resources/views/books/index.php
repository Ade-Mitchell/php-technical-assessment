<?php ob_start(); ?>

    <div class="top-bar">
        <div>
            <h1>Books</h1>
            <p class="muted">Manage your book records.</p>
        </div>

        <?php if (!empty($_SESSION['user'])): ?>
            <a href="/books/create" class="btn btn-primary">Add Book</a>
        <?php endif; ?>
    </div>

<?php if (empty($books)): ?>
    <p>No books found.</p>
<?php else: ?>
    <div class="table-wrap">
        <table>
            <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= htmlspecialchars($book['title']) ?></td>
                    <td><?= htmlspecialchars($book['author']) ?></td>
                    <td><?= htmlspecialchars((string) $book['published_year']) ?></td>
                    <td>
                        <div class="actions">
                            <?php if (!empty($_SESSION['user'])): ?>
                                <a href="/books/edit?id=<?= $book['id'] ?>" class="btn btn-secondary">Edit</a>

                                <form action="/books/delete" method="POST" class="inline-form">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars((string) $book['id']) ?>">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this book?')">
                                        Delete
                                    </button>
                                </form>
                            <?php else: ?>
                                <span class="muted">Login to manage</span>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
$title = 'Books';
require __DIR__ . '/../layout.php';