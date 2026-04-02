<?php ob_start(); ?>

    <h1>Add Book</h1>
    <p class="muted">Create a new book record.</p>

    <form action="/books/store" method="POST">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="<?= htmlspecialchars($data['title'] ?? '') ?>">
            <?php if (!empty($errors['title'])): ?>
                <div class="error-text"><?= htmlspecialchars($errors['title']) ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" value="<?= htmlspecialchars($data['author'] ?? '') ?>">
            <?php if (!empty($errors['author'])): ?>
                <div class="error-text"><?= htmlspecialchars($errors['author']) ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Published Year</label>
            <input type="number" name="published_year" value="<?= htmlspecialchars($data['published_year'] ?? '') ?>">
            <?php if (!empty($errors['published_year'])): ?>
                <div class="error-text"><?= htmlspecialchars($errors['published_year']) ?></div>
            <?php endif; ?>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Create Book</button>
            <a href="/books" class="btn btn-secondary">Cancel</a>
        </div>
    </form>

<?php
$content = ob_get_clean();
$title = 'Add Book';
require __DIR__ . '/../layout.php';