<?php

declare(strict_types=1);

namespace App\Core;

class Validator
{
    public static function validateBook(array $data): array
    {
        $errors = [];

        if (empty(trim($data['title'] ?? ''))) {
            $errors['title'] = 'Title is required.';
        }

        if (empty(trim($data['author'] ?? ''))) {
            $errors['author'] = 'Author is required.';
        }

        if (
            empty($data['published_year']) ||
            !filter_var($data['published_year'], FILTER_VALIDATE_INT)
        ) {
            $errors['published_year'] = 'Published year must be a valid integer.';
        }

        return $errors;
    }
}