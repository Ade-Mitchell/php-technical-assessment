<?php ob_start(); ?>

    <h1>Add Book</h1>

    <p><a href="/books">Back to books</a></p>

    <form action="/books/store" method="POST">

        <div>
            <label>Title</label><br>
            <input type="text" name="title">
        </div>

        <br>

        <div>
            <label>Author</label><br>
            <input type="text" name="author">
        </div>

        <br>

        <div>
            <label>Published Year</label><br>
            <input type="number" name="published_year">
        </div>

        <br>

        <button type="submit">Create</button>
    </form>

<?php
$content = ob_get_clean();
$title = 'Add Book';
require __DIR__ . '/../layout.php';