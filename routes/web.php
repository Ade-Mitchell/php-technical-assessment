<?php

use App\Controllers\BookController;

return [
    ['GET', '/', [BookController::class, 'index']],
    ['GET', '/books', [BookController::class, 'index']],

    ['GET', '/books/create', [BookController::class, 'create']],
    ['POST', '/books/store', [BookController::class, 'store']],

    ['GET', '/books/edit', [BookController::class, 'edit']],
    ['POST', '/books/update', [BookController::class, 'update']],
    ['POST', '/books/delete', [BookController::class, 'delete']],
];