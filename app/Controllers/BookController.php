<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Validator;
use App\Models\Book;

class BookController
{
    public function index(): void
    {
        $bookModel = new Book();
        $books = $bookModel->all();

        require __DIR__ . '/../../resources/views/books/index.php';
    }

    public function create(): void
    {
        $errors = [];
        require __DIR__ . '/../../resources/views/books/create.php';
    }

    public function store(): void
    {
        $data = [
            'title' => $_POST['title'] ?? '',
            'author' => $_POST['author'] ?? '',
            'published_year' => $_POST['published_year'] ?? '',
        ];

        $errors = Validator::validateBook($data);

        if (!empty($errors)) {
            require __DIR__ . '/../../resources/views/books/create.php';
            return;
        }

        $bookModel = new Book();
        $bookModel->create($data);

        header('Location: /books');
        exit;
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

        $errors = [];
        require __DIR__ . '/../../resources/views/books/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        $data = [
            'title' => $_POST['title'] ?? '',
            'author' => $_POST['author'] ?? '',
            'published_year' => $_POST['published_year'] ?? '',
        ];

        $errors = Validator::validateBook($data);

        $bookModel = new Book();

        if (!empty($errors)) {
            $book = array_merge(['id' => $id], $data);
            require __DIR__ . '/../../resources/views/books/edit.php';
            return;
        }

        $bookModel->update($id, $data);

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