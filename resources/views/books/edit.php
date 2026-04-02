<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
<h1>Edit Book</h1>

<p><a href="/books">Back to books</a></p>

<form>
    <div>
        <label>Title</label><br>
        <input type="text" value="<?= htmlspecialchars($book['title']) ?>">
    </div>

    <br>

    <div>
        <label>Author</label><br>
        <input type="text" value="<?= htmlspecialchars($book['author']) ?>">
    </div>

    <br>

    <div>
        <label>Published Year</label><br>
        <input type="number" value="<?= htmlspecialchars((string) $book['published_year']) ?>">
    </div>

    <br>

    <button type="submit">Update</button>
</form>
</body>
</html>