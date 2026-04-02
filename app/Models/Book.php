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

    public function update(int $id, array $data): bool
    {
        $stmt = Database::connection()->prepare(
            'UPDATE books 
             SET title = :title, author = :author, published_year = :published_year
             WHERE id = :id'
        );

        return $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'author' => $data['author'],
            'published_year' => $data['published_year'],
        ]);
    }

    public function create(array $data): bool
    {
        $stmt = Database::connection()->prepare(
            'INSERT INTO books (title, author, published_year)
         VALUES (:title, :author, :published_year)'
        );

        return $stmt->execute([
            'title' => $data['title'],
            'author' => $data['author'],
            'published_year' => $data['published_year'],
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = Database::connection()->prepare('DELETE FROM books WHERE id = :id');

        return $stmt->execute([
            'id' => $id,
        ]);
    }
}