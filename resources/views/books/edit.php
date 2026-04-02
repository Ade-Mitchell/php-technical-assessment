<?php ob_start(); ?>

    <h1>Edit Book</h1>
    <p class="muted">Update the selected book record.</p>

    <form action="/books/update" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars((string) $book['id']) ?>">

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>">
            <?php if (!empty($errors['title'])): ?>
                <div class="error-text"><?= htmlspecialchars($errors['title']) ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>">
            <?php if (!empty($errors['author'])): ?>
                <div class="error-text"><?= htmlspecialchars($errors['author']) ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Published Year</label>
            <input type="number" name="published_year" value="<?= htmlspecialchars((string) $book['published_year']) ?>">
            <?php if (!empty($errors['published_year'])): ?>
                <div class="error-text"><?= htmlspecialchars($errors['published_year']) ?></div>
            <?php endif; ?>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Update Book</button>
            <a href="/books" class="btn btn-secondary">Cancel</a>
        </div>
    </form>

<?php
$content = ob_get_clean();
$title = 'Edit Book';
require __DIR__ . '/../layout.php';