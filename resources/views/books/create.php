<?php ob_start(); ?>

    <h1>Add Book</h1>

    <p><a href="/books">Back to books</a></p>

    <form action="/books/store" method="POST">

        <div>
            <label>Title</label><br>
            <input type="text" name="title" value="<?= htmlspecialchars($data['title'] ?? '') ?>">
            <?php if (!empty($errors['title'])): ?>
                <p><?= htmlspecialchars($errors['title']) ?></p>
            <?php endif; ?>
        </div>

        <br>

        <div>
            <label>Author</label><br>
            <input type="text" name="author" value="<?= htmlspecialchars($data['author'] ?? '') ?>">
            <?php if (!empty($errors['author'])): ?>
                <p><?= htmlspecialchars($errors['author']) ?></p>
            <?php endif; ?>
        </div>

        <br>

        <div>
            <label>Published Year</label><br>
            <input type="number" name="published_year" value="<?= htmlspecialchars($data['published_year'] ?? '') ?>">
            <?php if (!empty($errors['published_year'])): ?>
                <p><?= htmlspecialchars($errors['published_year']) ?></p>
            <?php endif; ?>
        </div>

        <br>

        <button type="submit">Create</button>
    </form>

<?php
$content = ob_get_clean();
$title = 'Add Book';
require __DIR__ . '/../layout.php';