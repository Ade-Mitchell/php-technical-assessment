<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;

class BookController
{
    public function index(): void
    {
        $bookModel = new Book();
        $books = $bookModel->all();

        require __DIR__ . '/../../resources/views/books/index.php';
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);

        $bookModel = new Book();
        $book = $bookModel->find($id);

        if (!$book) {
            http_response_code(404);
            echo 'Book not found';
            return;
        }

        require __DIR__ . '/../../resources/views/books/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        $bookModel = new Book();
        $bookModel->update($id, [
            'title' => $_POST['title'] ?? '',
            'author' => $_POST['author'] ?? '',
            'published_year' => $_POST['published_year'] ?? '',
        ]);

        header('Location: /books');
        exit;
    }

    public function create(): void
    {
        require __DIR__ . '/../../resources/views/books/create.php';
    }

    public function store(): void
    {
        $bookModel = new Book();

        $bookModel->create([
            'title' => $_POST['title'] ?? '',
            'author' => $_POST['author'] ?? '',
            'published_year' => $_POST['published_year'] ?? '',
        ]);

        header('Location: /books');
        exit;
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        $bookModel = new Book();
        $bookModel->delete($id);

        header('Location: /books');
        exit;
    }
}