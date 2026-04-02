<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Book
{
    public function all(): array
    {
        $stmt = Database::connection()->query('SELECT * FROM books ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = Database::connection()->prepare('SELECT * FROM books WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $book = $stmt->fetch();

        return $book ?: null;
    }
}