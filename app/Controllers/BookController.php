<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Validator;
use App\Core\Logger;
use App\Core\Auth;
use App\Models\Book;

class BookController
{
    private function requireAuth(): void
    {
        if (!Auth::check()) {
            http_response_code(401);
            echo 'Unauthenticated. Please log in.';
            exit;
        }
    }

    public function index(): void
    {
        $bookModel = new Book();
        $books = $bookModel->all();

        require __DIR__ . '/../../resources/views/books/index.php';
    }

    public function create(): void
    {
        $this->requireAuth();

        $errors = [];
        $data = [
            'title' => '',
            'author' => '',
            'published_year' => '',
        ];

        require __DIR__ . '/../../resources/views/books/create.php';
    }

    public function store(): void
    {
        $this->requireAuth();

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

        try {
            $bookModel = new Book();
            $bookModel->create($data);

            header('Location: /books');
            exit;
        } catch (\Throwable $e) {
            Logger::error($e->getMessage());

            http_response_code(500);
            echo 'Something went wrong. Please try again.';
        }
    }

    public function edit(): void
    {
        $this->requireAuth();

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
        $this->requireAuth();

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

        try {
            $bookModel->update($id, $data);

            header('Location: /books');
            exit;
        } catch (\Throwable $e) {
            Logger::error($e->getMessage());

            http_response_code(500);
            echo 'Something went wrong. Please try again.';
        }
    }

    public function delete(): void
    {
        $this->requireAuth();

        $id = (int) ($_POST['id'] ?? 0);

        try {
            $bookModel = new Book();
            $bookModel->delete($id);

            header('Location: /books');
            exit;
        } catch (\Throwable $e) {
            Logger::error($e->getMessage());

            http_response_code(500);
            echo 'Something went wrong.';
        }
    }
}