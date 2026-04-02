<?php ob_start(); ?>

    <h1>Edit Book</h1>

    <p><a href="/books">Back to books</a></p>

    <form action="/books/update" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars((string) $book['id']) ?>">

        <div>
            <label>Title</label><br>
            <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>">
        </div>

        <br>

        <div>
            <label>Author</label><br>
            <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>">
        </div>

        <br>

        <div>
            <label>Published Year</label><br>
            <input type="number" name="published_year" value="<?= htmlspecialchars((string) $book['published_year']) ?>">
        </div>

        <br>

        <button type="submit">Update</button>
    </form>

<?php
$content = ob_get_clean();
$title = 'Edit Book';
require __DIR__ . '/../layout.php';