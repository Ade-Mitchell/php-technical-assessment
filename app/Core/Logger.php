<?php

declare(strict_types=1);

namespace App\Core;

class Logger
{
    public static function error(string $message): void
    {
        $file = __DIR__ . '/../../storage/logs/app.log';

        $date = date('Y-m-d H:i:s');

        file_put_contents(
            $file,
            "[{$date}] ERROR: {$message}" . PHP_EOL,
            FILE_APPEND
        );
    }
}