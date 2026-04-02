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
}