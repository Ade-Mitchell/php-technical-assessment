<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;

class HomeController
{
    public function index(): void
    {
        $bookModel = new Book();
        $books = $bookModel->all();

        require __DIR__ . '/../../resources/views/home.php';
    }
}